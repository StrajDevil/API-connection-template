# API connection template

Sample code for connecting to different APIs.

##About release:

- Design pattern used in this code: **Factory Method**
- Unit-test
- Authentication system is [Sanctum](https://laravel.com/docs/9.x/sanctum)
- Web interface on the [Quasar Framework](https://quasar.dev/)
- Json viewer is [vue3-json-viewer](https://github.com/qiuquanwu/vue3-json-viewer)

## Quick setup

1. Go to api repository: **cd api**
2. Copy .env.example to .env
3. Run migrate with seeder: **php artisan migrate:fresh --seed**
4. Run server command: **php artisan serve**
5. Go to app repository: **cd app**
6. Install Quasar CLI: **yarn global add @quasar/cli**
7. Install yarn package: **yarn install**
8. Start the app in development mode (hot-code reloading, error reporting, etc.): **quasar dev**
9. Open the page in browser: http://127.0.0.1:8080/