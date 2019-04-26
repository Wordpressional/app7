<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laratrust\Traits\LaratrustUserTrait ;
use App\User;
use App\Http\Traits\BrandsTrait;
use App\Http\Traits\DemoTrait;
use App\Shop\Customers\Customer;


use App\Notifications\ResetPasswordNotification;



use Auth;


class User extends Authenticatable
{
     
    use LaratrustUserTrait;
    use Notifiable;
   use BrandsTrait;
   use DemoTrait;
    


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'provider', 'provider_id', 'registered_at', 'api_token', 'displayname'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'registered_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Get the user's fullname titleized.
     *
     * @return string
     */
    public function getFullnameAttribute(): string
    {
        return title_case($this->name);
    }

    /**
     * Encrypt the user's password.
     *
     * @param string $passwword
     * @return void
     */
   public function setPasswordAttribute($password)
    {
        //$this->attributes['password'] = bcrypt($password);
      if(substr($password,6) == '$2y$10')
        $this->attributes['password'] = $password;
      else
        $this->attributes['password'] = bcrypt($password);
    }

    /**
     * Scope a query to only include users registered last week.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeLastWeek($query)
    {
        return $query->whereBetween('registered_at', [now()->subWeek(), now()])
                     ->latest();
    }

    /**
     * Scope a query to order users by latest registered.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeLatest($query)
    {
        return $query->orderBy('registered_at', 'desc');
    }

    /**
     * Scope a query to filter available author users.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeAuthors($query)
    {
        return $query->whereHas('roles', function ($query) {
            $query->where('roles.name', "cms_author")
             ;
        });
    }

    // /**
    //  * Check if the user can be an author
    //  *
    //  * @return boolean
    //  */
     public function canBeAuthor(): bool
     {
         return $this->isAuthor();
     }

     public function canBeEditor(): bool
     {
         return $this->isEditor();
     }

     public function canBeAdmin(): bool
     {
         return $this->isAdmin();
     }

     public function canBeSAdmin(): bool
     {
         return $this->isSAdmin();
     }

     public function canBeDemo(): bool
     {
         return $this->isDemo();
     }
     public function canBeSuperadmin(): bool
     {
         return $this->isSuperadministrator();
     }
     

    // /**
    //  * Check if the user has a role
    //  *
    //  * @param string $role
    //  * @return boolean
    //  */
     public function checkHasRole($role): bool
     {
        return $this->roles->where('name', $role)->isNotEmpty();
       
     }



    // /**
    //  * Check if the user has role admin
    //  *
    //  * @return boolean
    //  */
     public function isAdmin(): bool
     {
         return $this->checkHasRole("cms_administrator");
     }

     public function isAuthor(): bool
     {
         return $this->checkHasRole("cms_author");
     }

     public function isSAdmin(): bool
     {
         return $this->checkHasRole("cms_superadministrator");
     }

     public function isGeneralAdmin(): bool
     {
         return $this->checkHasRole("administrator");
     }

    
     public function islCEO(): bool
     {
         return $this->checkHasRole("elec_ceo");
     }

    // /**
    //  * Check if the user has role editor
    //  *
    //  * @return boolean
    //  */
     public function isEditor(): bool
     {
         return $this->checkHasRole("cms_editor");
     }

    /**
     * Return the user's posts
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function posts()
    {
        return $this->hasMany(Post::class, 'author_id');
    }

    /**
     * Return the user's comments
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany(Comment::class, 'author_id');
    }

    public function commentsfromusers()
    {
        return $this->hasMany(Comment::class, 'author_id');
    }

    

    /**
     * Return the user's likes
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function likes()
    {
        return $this->hasMany(Like::class, 'author_id');
    }

    /**
     * Return the user's roles
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class)->withTimestamps();
    }

    public function isCEO()
    {
      $data = $this->brandsAll();
       $user = User::where('email', $data['n_loggeduser'])->first();
       $role = User::with('roles')->where('email', $data['n_loggeduser'])->first();
       //$rname = ::where('name')
       //dd($data['n_loggeduser']);
       //dd($role->roles[0]->name);
      if($role->roles[0]->name == "elec_ceo")
       {
           return "yes";
       }
       return "no";
    }

    public function isDemo()
    {
      $data = $this->demoAll();
       $user = User::where('email', $data['n_loggeduser'])->first();
       $role = User::with('roles')->where('email', $data['n_loggeduser'])->first();
       //$rname = ::where('name')
       //dd($data['n_loggeduser']);
       //dd($role);
      if($role->roles[0]->name == "cust_demo")
       {
           return "yes";
       }
       return "no";
    }

    public function isPO()
    {
      $data = $this->brandsAll();
       $user = User::where('email', $data['n_loggeduser'])->first();
       $role = User::with('roles')->where('email', $data['n_loggeduser'])->first();
       //dd($role->name);
       
      if($role->roles[0]->name == "elec_presidingofficer")
       {
           return true;
       }
       return false;
    }

    public function isAERO()
    {
      $data = $this->brandsAll();
       $user = User::where('email', $data['n_loggeduser'])->first();
       $role = User::with('roles')->where('email', $data['n_loggeduser'])->first();
       //dd($role->name);
       
      if($role->roles[0]->name == "elec_asistantreturningofficer")
       {
           return true;
       }
       return false;
    }

    public function isRO()
    {
      $data = $this->brandsAll();
       $user = User::where('email', $data['n_loggeduser'])->first();
       $role = User::with('roles')->where('email', $data['n_loggeduser'])->first();
       
       
      if($role->roles[0]->name == "elec_returningofficer")
       {
           return true;
       }
       return false;
    }

    public function isSuperAdmin()
    {
      $data = $this->brandsAll();
       $user = User::where('email', $data['n_loggeduser'])->first();
       $role = User::with('roles')->where('email', $data['n_loggeduser'])->first();
       //dd($role->name);
       
      if($role->roles[0]->name == "elec_superadmin")
       {
           return true;
       }
       return false;
    }

    public function isSuperadministrator()
    {
      $data = $this->brandsAll();
       $user = User::where('email', $data['n_loggeduser'])->first();
       $role = User::with('roles')->where('email', $data['n_loggeduser'])->first();
       //dd($role->name);
       
      if($role->roles[0]->name == "superadministrator")
       {
           return "yes";
       }
       return "no";
    }

    public function isBoothOfficer()
    {
      $data = $this->brandsAll();
       $user = User::where('email', $data['n_loggeduser'])->first();
       $role = User::with('roles')->where('email', $data['n_loggeduser'])->first();
       //dd($role->name);
       
      if($role->roles[0]->name == "elec_bootlevelofficer")
       {
           return "yes";
       }
       return "no";
    }

    public function isCMSAdmin()
    {
      $data = $this->brandsAll();
       $user = User::where('email', $data['n_loggeduser'])->first();
       $role = User::with('roles')->where('email', $data['n_loggeduser'])->first();
       //dd($role->name);
       
      if($role->roles[0]->name == "cms_administrator")
       {
           return true;
       }
       return false;
    }

    public function isCMSEditor()
    {
      $data = $this->brandsAll();
       $user = User::where('email', $data['n_loggeduser'])->first();
       $role = User::with('roles')->where('email', $data['n_loggeduser'])->first();
       //dd($role->name);
       
      if($role->roles[0]->name == "cms_editor")
       {
           return true;
       }
       return false;
    }

    public function isCMSAuthor()
    {
      $data = $this->brandsAll();
       $user = User::where('email', $data['n_loggeduser'])->first();
       $role = User::with('roles')->where('email', $data['n_loggeduser'])->first();
       //dd($role->name);
       
      if($role->roles[0]->name == "cms_author")
       {
           return true;
       }
       return false;
    }

    public function isCMSSubscriber()
    {
      $data = $this->brandsAll();
       $user = User::where('email', $data['n_loggeduser'])->first();
       $role = User::with('roles')->where('email', $data['n_loggeduser'])->first();
       //dd($role->name);
       
      if($role->roles[0]->name == "cms_subscriber")
       {
           return true;
       }
       return false;
    }

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }

    public function customers()
    {
        return $this->belongsToMany(Customer::class)->withTimestamps();
    }
  
}
