public function index()
{
    $users = User::paginate(10); // Adjust the number of items per page as needed
    return view('Admin.users', compact('users'));
}