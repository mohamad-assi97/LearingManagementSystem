<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New User</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <div class="container mx-auto mt-10 p-6 bg-white shadow-lg rounded-lg max-w-lg">
        <h1 class="text-3xl font-semibold text-center text-gray-800 mb-6">Add New User</h1>
        
        @if ($errors->any())
            <div class="bg-red-100 text-red-800 p-4 rounded mb-6">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
        <form action="{{ route('users.store') }}" method="POST" class="space-y-4">
            @csrf
            <div class="form-group">
                <label for="name" class="block text-sm font-medium text-gray-600">Name</label>
                <input type="text" name="name" class="w-full p-3 mt-1 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter user name" value="{{ old('name') }}" required>
            </div>
            
            <div class="form-group">
                <label for="email" class="block text-sm font-medium text-gray-600">Email</label>
                <input type="email" name="email" class="w-full p-3 mt-1 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter user email" value="{{ old('email') }}" required>
            </div>
            
            <div class="form-group">
                <label for="password" class="block text-sm font-medium text-gray-600">Password</label>
                <input type="password" name="password" class="w-full p-3 mt-1 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter password" required>
            </div>
            
            <div class="form-group">
                <label for="role" class="block text-sm font-medium text-gray-600">Role</label>
                <select name="role" class="w-full p-3 mt-1 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    <option value="" disabled selected>Select role</option>
                    <option value="admin">Admin</option>
                    <option value="student">Student</option>
                    <option value="teacher">Teacher</option>
                </select>
            </div>
            
            <div class="form-group text-center">
                <button type="submit" class="w-full py-3 bg-blue-500 text-white rounded-md hover:bg-blue-600 transition duration-300">Submit</button>
            </div>
        </form>
    </div>

</body>
</html>