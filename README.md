# Sales management system with user roles

-   install debugbar for dev `composer require barryvdh/laravel-debugbar:* --dev`
-   then add this in the config/app file: `Barryvdh\Debugbar\ServiceProvider::class`

## Update using modal

```php
<livewire:modal id="edit-modal" title="Edit User">
<input type="text" wire:model="name" placeholder="Name">
<input type="email" wire:model="email" placeholder="Email">
<button wire:click="update">Update</button>
</livewire:modal>

```

```php
class Users extends LivewireComponent
{
    public $name;
    public $email;

    public function render()
    {
        return view('users.index', [
            'users' => User::all()
        ]);
    }

    public function edit($id)
    {
        $user = User::find($id);

        $this->name = $user->name;
        $this->email = $user->email;

        $this->emit('open-modal', 'edit-modal');
    }

    public function update()
    {
        $user = User::find($this->id);

        $user->name = $this->name;
        $user->email = $this->email;

        $user->save();

        $this->emit('close-modal', 'edit-modal');
    }
}
```

To generate a random string of characters, save it to the database, and check if the string doesn't exist to generate a new one in Laravel Livewire, you can follow these steps:

1. First, create a Livewire component for this task. Run the following command in your terminal:

```bash
php artisan make:livewire UniqueStringGenerator
```

This will create two files: `app/Http/Livewire/UniqueStringGenerator.php` and `resources/views/livewire/unique-string-generator.blade.php`.

2. In the `UniqueStringGenerator.php` file, import necessary classes and create a function to generate a random string of characters:

```php
use Illuminate\Support\Str;
use App\Models\UniqueString; // Assuming you have a model called UniqueString with a 'value' field for storing the unique string.

class UniqueStringGenerator extends Component
{
    public function generateUniqueString()
    {
        do {
            $randomString = Str::random(10); // Generate a random string of 10 characters.
        } while (UniqueString::where('value', $randomString)->exists()); // Check if the string already exists in the database.

        // Save the unique string to the database.
        $uniqueString = new UniqueString();
        $uniqueString->value = $randomString;
        $uniqueString->save();

        // Return the unique string.
        return $randomString;
    }

    public function render()
    {
        return view('livewire.unique-string-generator');
    }
}
```

3. In the `unique-string-generator.blade.php` file, create a simple button that will trigger the `generateUniqueString` method:

```html
<div>
    <button wire:click="generateUniqueString">Generate Unique String</button>
</div>
```

4. Include the Livewire component in your main view:

```html
<body>
    ... @livewire('unique-string-generator') ...
</body>
```

Now, when you click the "Generate Unique String" button in your web application, it will generate a random string of characters, check if it's unique, and save it to the database. If the string already exists, it will generate a new one until a unique string is found.

References:

-   [Source 1](https://laravel-livewire.com/)
-   [Source 2](https://calebporzio.com/how-livewire-works-a-deep-dive)

To get all records from a database in Laravel, there are several ways of doing it, including:

1. Using Eloquent ORM: Eloquent is Laravel's built-in ORM. You can use it to retrieve records from the database with ease. Here's an example:

```
$records = App\Models\Record::all();
```

2. Using Query Builder: Laravel provides a fluent query builder interface to build and run database queries. Here's an example:

```
$records = DB::table('records')->get();
```

3. Using Raw SQL Queries: You can also use raw SQL queries to retrieve records from the database. Here's an example:

```
$records = DB::select('SELECT * FROM records');
```

Note that when using `all()` or `get()` method to retrieve all records, you should be careful as this may cause performance issues when dealing with large datasets. Instead, you can use `chunk()` method to retrieve records in smaller batches.

Here's an example of using `chunk()` method to retrieve records in batches of 100:

```php
DB::table('records')->orderBy('id')->chunk(100, function ($records) {
    foreach ($records as $record) {
        // process each record
    }
});
```

Sources:

-   [Source 0](https://coderflex.com/blog/2-ways-to-fetch-the-first-and-last-records-from-the-database-in-laravel)
-   [Source 1](https://demonuts.com/laravel-get-all-data-records/)
-   [Source 2](https://stackoverflow.com/questions/21891815/select-all-from-table-with-laravel-and-eloquent)
-   [Source 4](https://www.studentstutorial.com/laravel/retrieve-data-laravel)

=========================================================
To get and update a particular record from the database in Laravel using a Bootstrap modal, you can follow these steps:

1. Create a route to fetch the record data and another route to update the record.

```php
// routes/web.php
Route::get('/edit/{id}', 'PagesController@edit');
Route::post('/update/{id}', 'PagesController@update');
```

2. Create the `edit` and `update` methods in your controller to fetch and update the record.

```php
// app/Http/Controllers/PagesController.php
public function edit($id){
    $editData = Page::getuserData($id);
    return response()->json(['editData' => $editData]);
}

public function update(Request $request, $id){
    $data = array(
        'name' => $request->input('name'),
        'email' => $request->input('email')
    );
    Page::updateData($id, $data);
    return redirect()->back()->with('message', 'Update successfully.');
}
```

3. In your view, create a Bootstrap modal and use JavaScript/jQuery to fetch the record data and populate the modal fields when the edit button is clicked. Then, use a form to submit the updated data.

```html
<!-- resources/views/index.blade.php -->
<!-- The Edit Button -->
<button class="btn btn-primary editBtn" data-id="{{ $user->id }}">Edit</button>

<!-- The Bootstrap Modal -->
<div
    class="modal fade"
    id="editModal"
    tabindex="-1"
    role="dialog"
    aria-labelledby="editModalLabel"
    aria-hidden="true"
>
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="post" action="#">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Record</h5>
                    <button
                        type="button"
                        class="close"
                        data-dismiss="modal"
                        aria-label="Close"
                    >
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="editId" id="editId" />
                    <div class="form-group">
                        <label for="editName">Name</label>
                        <input
                            type="text"
                            class="form-control"
                            id="editName"
                            name="name"
                        />
                    </div>
                    <div class="form-group">
                        <label for="editEmail">Email</label>
                        <input
                            type="email"
                            class="form-control"
                            id="editEmail"
                            name="email"
                        />
                    </div>
                </div>
                <div class="modal-footer">
                    <button
                        type="button"
                        class="btn btn-secondary"
                        data-dismiss="modal"
                    >
                        Close
                    </button>
                    <button type="submit" class="btn btn-primary">
                        Save changes
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- JavaScript/jQuery to fetch data and populate the modal -->
<script>
    $(document).ready(function () {
        $(".editBtn").on("click", function () {
            const id = $(this).data("id");
            $.get("/edit/" + id, function (response) {
                $("#editId").val(response.editData.id);
                $("#editName").val(response.editData.name);
                $("#editEmail").val(response.editData.email);
                $("form").attr("action", "/update/" + id);
                $("#editModal").modal("show");
            });
        });
    });
</script>
```

Now, when you click the Edit button, the Bootstrap modal will display the record data, and when you submit the form, the updated data will be sent to the `update` method in your controller to update the record in the database.

========================================
To get and update a particular record from the database in Laravel Livewire using Bootstrap Modal, you can follow these steps:

1. Create a Livewire component for the CRUD operation using the `php artisan make:livewire` command. For example, to create a component named `users`, run the command `php artisan make:livewire users`. This will create a PHP file named `Users.php` in the `app/Http/Livewire` directory and a Blade file named `users.blade.php` in the `resources/views/livewire` directory.

2. In the `Users.php` file, define the necessary properties, such as `$users`, `$name`, `$email`, and `$user_id`, and the `$updateMode` flag to keep track of whether the modal is in "create" or "edit" mode. Also, define the `render()` method to fetch all the users from the database and return the `users.blade.php` view.

3. In the `users.blade.php` file, include the Bootstrap modal that will be used for both creating and editing users. Use Livewire directives to bind the modal inputs to the component properties, and define methods for creating, editing, and deleting users.

4. In the `edit()` method of the `Users` component, set the `$updateMode` flag to `true`, fetch the user record from the database based on the `$id` parameter, and populate the modal inputs with the user's data.

5. In the `update()` method of the `Users` component, validate the input fields, update the user record in the database based on the `$user_id` property, and reset the input fields and `$updateMode` flag.

6. In the `delete()` method of the `Users` component, delete the user record from the database based on the `$id` parameter.

7. To close the modal upon successfully posting the form, you can emit a custom event from the component using `this->emit()` and listen to it in JavaScript using `window.livewire.on()`. In the JavaScript callback function, you can close the modal using jQuery or Alpine.js.

Here's an example implementation of the above steps:

```
// app/Http/Livewire/Users.php

<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\User;

class Users extends Component
{
    public $users, $name, $email, $user_id;
    public $updateMode = false;

    public function render()
    {
        $this->users = User::all();
        return view('livewire.users');
    }

    private function resetInputFields()
    {
        $this->name = '';
        $this->email = '';
    }

    public function store()
    {
        $validatedData = $this->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
        ]);

        User::create($validatedData);

        session()->flash('message', 'User created successfully.');

        $this->resetInputFields();

        $this->emit('userStored');
    }

    public function edit($id)
    {
        $this->updateMode = true;

        $user = User::findOrFail($id);

        $this->user_id = $id;
        $this->name = $user->name;
        $this->email = $user->email;
    }

    public function update()
    {
        $validatedData = $this->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$this->user_id,
        ]);

        $user = User::findOrFail($this->user_id);

        $user->update([
            'name' => $this->name,
            'email' => $this->email,
        ]);

        session()->flash('message', 'User updated successfully.');

        $this->resetInputFields();
        $this->updateMode = false;
    }

    public function delete($id)
    {
        User::findOrFail($id)->delete();

        session()->flash('message', 'User deleted successfully.');
    }
}
```

```php
{{-- resources/views/livewire/users.blade.php --}}

<div>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        Create User
    </button>
    <table class="table mt-4">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
    <button type="button" class="btn btn-primary btn
```

=====================================
To add Sweet Alert in Laravel Livewire, you can use the `akhaled/livewire-sweetalert` package. Follow these steps to integrate Sweet Alert with Laravel Livewire:

1. Install the package using Composer:

```
composer require akhaled/livewire-sweetalert
```

2. Include the JavaScript for SweetAlert2 and LivewireSweetalert in your main layout file:

```html
...
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@livewireScripts
@livewireSweetalertScripts
</body>
```

3. Publish the configuration file:

```
php artisan vendor:publish --tag=livewire-sweetalert-config
```

Now you can use Sweet Alert in your Livewire components. There are three main types of alerts: Toast, Fire, and Confirm.

**Toast:**

To use a Toast alert, add the `Toast` trait to your component and call the `toast` method:

```php
use Akhaled\LivewireSweetalert\Toast;
use Livewire\Component;

class MyComponent extends Component
{
    use Toast;

    public function save() {
        $this->toast('Toast message', 'success', 5000);
    }
    ...
}
```

**Fire:**

To use a Fire alert (normal SweetAlert modal), add the `Fire` trait to your component and call the `fire` method:

```php
use Akhaled\LivewireSweetalert\Fire;
use Livewire\Component;

class MyComponent extends Component
{
    use Fire;

    public function save() {
        $options = [];
        $this->fire('Error happened', 'error', 'please try again later', $options);
    }
    ...
}
```

**Confirm:**

To use a Confirm alert, add the `Confirm` trait to your component and call the `confirm` method. On confirmation, a `confirmed` event is emitted:

```php
use Akhaled\LivewireSweetalert\Confirm;
use Livewire\Component;

class MyComponent extends Component
{
    use Confirm;
    protected $listeners = [
        'confirmed' => 'onConfirmation'
    ];

    public function delete()
    {
        $options = [];
        $this->confirm('Are you sure you want to delete', 'you can\'t revert that', $options);
    }

    public function onConfirmation()
    {
        dd('confirmed!');
    }
}
```

For more details and examples, refer to the [akhaled/livewire-sweetalert documentation](https://packagist.org/packages/akhaled/livewire-sweetalert).
