# UST Timetable Calendar

Demo-project showing how to use roles-permissions (students, admins, super admins), Eloquent Query Scopes and how to build a simple table-based timetable calendar without any JavaScript plugin.

- - - - -

## Screenshots 

!UST Calendar](https://quickadminpanel.com/blog/wp-content/uploads/2020/02/Screen-Shot-2020-02-18-at-10.18.36-AM.png)

- - - - - 

!UST Class Schedule](https://quickadminpanel.com/blog/wp-content/uploads/2020/02/Screen-Shot-2020-02-18-at-10.26.27-AM.png)

- - - - - 

!UST Add New Lesson](https://quickadminpanel.com/blog/wp-content/uploads/2020/02/Screen-Shot-2020-02-18-at-10.24.56-AM.png)

- - - - -

## How to use

- download the zipfile from _github_
- Copy __.env.example__ file to __.env__ and edit database credentials there
- Run __composer install__
- Run __php artisan key:generate__
- Run __php artisan migrate --seed__ (it has some seeded data for your testing)
- That's it: launch the main URL. 
- Super Admin's credentials: __admin@admin.com__ - __password__
- Admin's credentials: __teacher@teacher.com__ - __password__
- Student's credentials: __student@student.com__ - __password__


- - - - -

## License

Basically, feel free to use and re-use any way you want.

- - - - -

## More from our LaravelDaily Team

- Check out our adminpanel generator [QuickAdminPanel](https://quickadminpanel.com)
- Read our [Blog with Laravel Tutorials](https://laraveldaily.com)
- FREE E-book: [50 Laravel Quick Tips (and counting)](https://laraveldaily.com/free-e-book-40-laravel-quick-tips-and-counting/)
- Subscribe to our [YouTube channel Laravel Business](https://www.youtube.com/channel/UCTuplgOBi6tJIlesIboymGA)
- Enroll in our [Laravel Online Courses](https://laraveldaily.teachable.com/)
