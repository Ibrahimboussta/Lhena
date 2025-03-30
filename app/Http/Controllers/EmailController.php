public function index()
{
    $emails = Email::latest()->paginate(10); // Paginate with 10 emails per page
    return view('Admin.emails', compact('emails'));
}