# Laravel - Quản lý vật tư

## Requirements

-   **PHP >= v8.0**
-   **Laravel = v8**

Clone project and run test.

```
$ git clone https://git_url_clone <project_dir>
$ cd <project_dir>
$ composer install
```

Fix Login

```
$ Open file EloquentUserProvider: (đường dẫn đến file) = ...\DA-TTTN\vendor\laravel\framework\src\Illuminate\Auth\EloquentUserProvider
$ Copy and paste hàm bên dưới vào file EloquentUserProvider dòng 157:
public function validateCredentials(UserContract $user, array $credentials)
    {
        $plain = $credentials['Password'];
        if(md5($plain) == $user->getAuthPassword())
            return true;
        return false;
    }
$ Ctrl + f tìm và thay thế tất cả chuỗi password thành Password trong file EloquentUserProvider
```
