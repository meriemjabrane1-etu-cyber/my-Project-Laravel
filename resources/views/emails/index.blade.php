<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MailBox</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Space+Mono:wght@400;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; background: #0a0a0a; color: #f0f0f0; }
        .mono { font-family: 'Space Mono', monospace; }
        .card { background: #111; border: 1px solid #1e1e1e; border-radius: 16px; }
        .input-field {
            background: #0d0d0d; border: 1px solid #2a2a2a; border-radius: 10px;
            padding: 10px 14px; color: #f0f0f0; font-family: 'Space Mono', monospace;
            font-size: 13px; width: 100%; outline: none; transition: border 0.2s;
        }
        .input-field:focus { border-color: #00D2FF; box-shadow: 0 0 0 3px rgba(0,210,255,0.1); }
        .input-field.error { border-color: #FF4757; }
        .btn-primary {
            background: #00D2FF; color: #000; border: none; border-radius: 10px;
            padding: 11px 28px; font-weight: 700; font-family: 'Space Mono', monospace;
            font-size: 12px; letter-spacing: 2px; cursor: pointer; transition: all 0.2s;
        }
        .btn-primary:hover { background: #00b8d9; transform: translateY(-1px); }
        .filter-btn {
            padding: 6px 16px; border-radius: 20px; font-size: 11px; font-weight: 700;
            font-family: 'Space Mono', monospace; cursor: pointer; transition: all 0.2s;
            background: #1a1a1a; color: #555; border: 1px solid #2a2a2a; letter-spacing: 1px;
            text-decoration: none; display: inline-block;
        }
        .filter-btn.active { background: #00D2FF; color: #000; border-color: #00D2FF; }
        .filter-btn:hover:not(.active) { border-color: #444; color: #888; }
        .email-row {
            border-radius: 12px; padding: 16px 20px;
            display: flex; align-items: center; gap: 16px;
            transition: all 0.2s; border: 1px solid #252525;
            animation: slideIn 0.3s ease;
        }
        .email-row:hover { background: #161616; }
        .email-row.is-read { opacity: 0.5; border-color: #1a1a1a; }
        .badge {
            border-radius: 6px; padding: 2px 10px;
            font-size: 11px; font-weight: 700; font-family: 'Space Mono', monospace; letter-spacing: 1px;
        }
        .badge-high   { background: rgba(255,71,87,0.1);  color: #FF4757; border: 1px solid rgba(255,71,87,0.3); }
        .badge-medium { background: rgba(255,165,2,0.1);  color: #FFA502; border: 1px solid rgba(255,165,2,0.3); }
        .badge-low    { background: rgba(46,213,115,0.1); color: #2ED573; border: 1px solid rgba(46,213,115,0.3); }
        .btn-delete {
            background: transparent; border: 1px solid #2a2a2a; border-radius: 8px;
            color: #FF4757; cursor: pointer; padding: 6px 14px; font-size: 12px;
            font-family: 'Space Mono', monospace; transition: all 0.2s; flex-shrink: 0;
        }
        .btn-delete:hover { background: rgba(255,71,87,0.1); border-color: #FF4757; }
        .left-accent-high   { border-left: 3px solid #FF4757; }
        .left-accent-medium { border-left: 3px solid #FFA502; }
        .left-accent-low    { border-left: 3px solid #2ED573; }
        .left-accent-read   { border-left: 3px solid #1e1e1e; }
        label.field-label {
            font-size: 10px; font-weight: 700; letter-spacing: 2px;
            color: #555; text-transform: uppercase; font-family: 'Space Mono', monospace;
            display: block; margin-bottom: 6px;
        }
        @keyframes slideIn { from { opacity: 0; transform: translateY(-6px); } to { opacity: 1; transform: translateY(0); } }
    </style>
</head>
<body>
<div style="max-width: 900px; margin: 0 auto; padding: 40px 24px;">

   
    <div style="margin-bottom: 40px;">
        <div style="display:flex; align-items:center; gap:12px; margin-bottom:4px;">
            <span style="font-size:26px;">📬</span>
            <h1 class="mono" style="font-size:28px; font-weight:700; margin:0; letter-spacing:-1px;">
                Mail<span style="color:#00D2FF;">Box</span>
            </h1>
        </div>
        <p class="mono" style="color:#444; font-size:11px; margin:0; letter-spacing:3px;">COMPOSE · MANAGE · FILTER</p>
    </div>

    {{-- ═══ VALIDATION ERRORS ═══ --}}
    @if ($errors->any())
        <div style="background:rgba(255,71,87,0.08); border:1px solid rgba(255,71,87,0.3); border-radius:12px; padding:16px 20px; margin-bottom:24px;">
            <p class="mono" style="color:#FF4757; font-size:11px; letter-spacing:2px; margin:0 0 8px;">⚠ VALIDATION ERRORS</p>
            @foreach ($errors->all() as $error)
                <p style="color:#FF6B7A; font-size:13px; margin:4px 0;">• {{ $error }}</p>
            @endforeach
        </div>
    @endif

    {{-- ═══ FORM ═══ --}}
    <div class="card" style="padding:28px; margin-bottom:28px;">
        <p class="mono" style="color:#00D2FF; font-size:11px; letter-spacing:3px; margin:0 0 24px; font-weight:700;">✉ NEW EMAIL</p>

        <form action="{{ route('email.store') }}" method="POST">
            @csrf
            <div style="display:grid; grid-template-columns:1fr 1fr; gap:16px;">

                <div>
                    <label class="field-label">Name</label>
                    <input type="text" name="name" value="{{ old('name') }}"
                           class="input-field {{ $errors->has('name') ? 'error' : '' }}"
                           placeholder="Full name">
                </div>

                <div>
                    <label class="field-label">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}"
                           class="input-field {{ $errors->has('email') ? 'error' : '' }}"
                           placeholder="example@mail.com">
                </div>

                <div>
                    <label class="field-label">Phone</label>
                    <input type="number" name="phone" value="{{ old('phone') }}"
                           class="input-field {{ $errors->has('phone') ? 'error' : '' }}"
                           placeholder="0612345678">
                </div>

                <div>
                    <label class="field-label">Priority</label>
                    <select name="priority" class="input-field">
                        <option value="High"   {{ old('priority') == 'High'   ? 'selected' : '' }}>🔴 High</option>
                        <option value="Medium" {{ old('priority') == 'Medium' ? 'selected' : '' }}>🟡 Medium</option>
                        <option value="Low"    {{ old('priority') == 'Low'    ? 'selected' : '' }}>🟢 Low</option>
                    </select>
                </div>

                <div style="grid-column: 1 / -1;">
                    <label class="field-label">Message</label>
                    <textarea name="message" rows="3"
                              class="input-field {{ $errors->has('message') ? 'error' : '' }}"
                              placeholder="Your message..." style="resize:vertical;">{{ old('message') }}</textarea>
                </div>

            </div>
            <button type="submit" class="btn-primary" style="margin-top:20px;">SEND →</button>
        </form>
    </div>

    {{-- ═══ FILTERS ═══ --}}
    <div style="background:#0e0e0e; border:1px solid #1a1a1a; border-radius:12px; padding:14px 20px; margin-bottom:20px; display:flex; flex-wrap:wrap; gap:10px; align-items:center;">

        <span class="mono" style="font-size:10px; color:#444; letter-spacing:2px; margin-right:4px;">PRIORITY</span>
        @foreach (['All', 'High', 'Medium', 'Low'] as $p)
            <a href="{{ route('email.index', array_merge(request()->query(), ['priority' => $p])) }}"
               class="filter-btn {{ request('priority', 'All') == $p ? 'active' : '' }}">
                {{ $p }}
            </a>
        @endforeach

        <span class="mono" style="font-size:10px; color:#444; letter-spacing:2px; margin-left:12px; margin-right:4px;">STATUS</span>
        @foreach (['All', 'Read', 'Unread'] as $r)
            <a href="{{ route('email.index', array_merge(request()->query(), ['read' => $r])) }}"
               class="filter-btn {{ request('read', 'All') == $r ? 'active' : '' }}">
                {{ $r }}
            </a>
        @endforeach

        <span class="mono" style="margin-left:auto; font-size:11px; color:#333;">
            {{ $emails->count() }} result{{ $emails->count() != 1 ? 's' : '' }}
        </span>
    </div>

    {{-- ═══ EMAIL LIST ═══ --}}
    <div style="display:flex; flex-direction:column; gap:10px;">

        @forelse ($emails as $email)
            <div class="email-row {{ $email->read ? 'is-read left-accent-read' : 'left-accent-' . strtolower($email->priority) }}"
                 style="background: {{ $email->read ? '#0d0d0d' : '#131313' }};">

                {{-- Toggle Read --}}
                <form action="{{ route('email.toggle', $email->id) }}" method="POST" style="flex-shrink:0;">
                    @csrf
                    @method('PATCH')
                    <input type="checkbox"
                           {{ $email->read ? 'checked' : '' }}
                           onchange="this.form.submit()"
                           style="width:16px; height:16px; accent-color:#00D2FF; cursor:pointer;">
                </form>

                {{-- Content --}}
                <div style="flex:1; min-width:0;">
                    <div style="display:flex; align-items:center; gap:10px; margin-bottom:5px; flex-wrap:wrap;">
                        <span style="font-weight:600; font-size:14px;">{{ $email->name }}</span>
                        <span style="color:#555; font-size:12px; font-family:'Space Mono',monospace;">{{ $email->email }}</span>
                        <span class="badge badge-{{ strtolower($email->priority) }}">
                            {{ $email->priority == 'High' ? '🔴' : ($email->priority == 'Medium' ? '🟡' : '🟢') }}
                            {{ $email->priority }}
                        </span>
                        @if ($email->read)
                            <span class="mono" style="font-size:10px; color:#2ED573; letter-spacing:1px;">✓ READ</span>
                        @endif
                    </div>
                    <p style="color:#666; font-size:13px; margin:0 0 4px; overflow:hidden; text-overflow:ellipsis; white-space:nowrap;">
                        {{ $email->message }}
                    </p>
                    <span class="mono" style="color:#444; font-size:11px;">📞 {{ $email->phone }}</span>
                </div>

                {{-- Delete --}}
                <form action="{{ route('email.destroy', $email->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn-delete"
                            onclick="return confirm('Delete this email?')">DEL</button>
                </form>

            </div>
        @empty
            <div style="text-align:center; padding:60px; color:#2a2a2a;">
                <p class="mono" style="font-size:13px; letter-spacing:3px;">NO EMAILS FOUND</p>
            </div>
        @endforelse

    </div>

</div>
</body>
</html>
