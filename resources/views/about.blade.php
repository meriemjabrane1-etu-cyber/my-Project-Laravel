@extends('layouts.index')
@section('content')
    <div class=" h-[60vh] bg-amber-700 ">


        <h1 class="">Lorem, ipsum.</h1>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae, libero sunt quas accusamus facere ipsam
            perferendis unde itaque asperiores, error debitis praesentium vel adipisci eveniet quasi animi nobis aut
            tenetur?</p>
        {{-- les relation mabin les table : rolaichen ship
            1 to mini
            mini to mini --}}
        {{-- * les relation mabin les table --}}
        {{-- Laravel كيوفر Eloquent ORM باش يسهل التعامل مع العلاقات بين الجداول ف database.
            kaynin 3idat anwa3 men rolaichen ship :
        {{-- *1:One to One :
              3ala9at Record we7da m3a record wa7ed <ex> User 3ando Phone wa7ed use App\Models\Phone;

                                                          class User extends Model
                                                        {
                                                              public function phone()
                                                            {
                                                              return $this->hasOne(Phone::class);
                                                            }
                                                        }
                                                    wl3aks :
                                                        class Phone extends Model
                                                        {
                                                            public function user()
                                                            {
                                                                return $this->belongsTo(User::class);
                                                            }
                                                        }
                                                            مثال: User ↔ Profile
                                                            users
                                                            +----+-------+
                                                            | id | name  |
                                                            +----+-------+
                                                            |
                                                            | 1 ---- 1
                                                            |
                                                            profiles
                                                            +----+---------+---------+
                                                            | id | user_id | bio     |
                                                            +----+---------+---------+
                                                            *kol User 3ando Profile wa7ed wkol Profile tabe3 l User wa7ed

            * 2: One to Many : 3ala9at Record wa7ed m3a 3idat Records ; <ex> xi Post 3ando bzaf ta3 les Comments
                                                                        use App\Models\Comment;

                                                                        class Post extends Model
                                                                        {
                                                                            public function comments()
                                                                            {
                                                                                return $this->hasMany(Comment::class);
                                                                            }
                                                                        }
                                                                 *wl3aks :
                                                                 class Comment extends Model
                                                                {
                                                                    public function post()
                                                                    {
                                                                         return $this->belongsTo(Post::class);
                                                                     }
                                                                }
                                                            *مثال: Post ↔ Comments
                                                            posts
                                                            +----+--------+
                                                            | id | title  |
                                                            +----+--------+
                                                            |
                                                            | 1 ---- *
                                                            |
                                                            comments
                                                            +----+---------+----------+
                                                            | id | post_id | content  |
                                                            +----+---------+----------+
            * 3 Many TO Many :
            3idat records mtrabtin m3a records </ex> User y9der ykoun 3ande bzaf Roles
                                                    class User extends Model
                                                    {
                                                        public function roles()
                                                        {
                                                            return $this->belongsToMany(Role::class);
                                                        }
                                                    }
                                                * wl3aks :
                                                class Role extends Model
                                                {
                                                    public function users()
                                                    {
                                                        return $this->belongsToMany(User::class);
                                                    }
                                                }
                                            * ex : Students ↔ Courses
                                                hna kan7tajo table wasit (pivot table)
                                                students
                                                +----+------+
                                                | id | name |
                                                +----+------+

                                                courses
                                                +----+---------+
                                                | id | title   |
                                                +----+---------+

                                                course_student
                                                +------------+-----------+
                                                | student_id | course_id |
                                                +------------+-----------+
                                                le relation :
                                                students  * ---- *  courses
                                                        \         /
                                                         \       /
                                                        course_student
                                                tudent y9de ykoun f bzaf ta3 Courses  et Course fih bzaf ta3 Students

            * documentation : Laravel → Eloquent Relationships
            Kifax tsta3mel l3ala9at :

                    $user = User::find(1);
                    $user->phone;
            ou :
                    $post = Post::find(1);
                    $post->comments;


            * ex : Gallery
            photographers
            +----+------+
            | id | name |
            +----+------+

            photos
            +----+----------------+------------------+
            | id | photographer_id| image            |
            +----+----------------+------------------+
                l relation :
                photographers 1 ---- * photos

                *ok db nxer7o xno tidiro had relation shep
              --}}


    </div>
@endsection
