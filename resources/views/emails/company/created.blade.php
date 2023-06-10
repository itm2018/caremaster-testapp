<div class="container" style="padding: 1rem; background: #f5f5f5;">
<p><b>Hi,</b></p>

<p>I hope you’re having a wonderful day!</p>

<p>I am emailing you today to let you know we have added your company into our profile.</p>
<h2>Company Details:</h2>
<p></p>
<p>- Logo: @if($company->logo)<img style="width: 100px; height: 100px" src="{{asset('storage/logos/'.$company->logo)}}" />@endif</p>
<p>- Name: {{$company->name}}</p>
<p>- Email: {{$company->email}}</p>
<p>- Website: {{$company->website}}</p>
<p>- Created at: {{$company->created_at}}</p>
<p></p>
<p>To learn more about what it does, <a href="{{url(route('company.show', $company))}}">click here</a></p>
<p></p>
<p></p>

<p>If you have any questions about this matter, please respond to this email or use the live chat on the web page. Our staff is waiting to respond to you.</p>

<p><b>Thank you,</b></p>
<br/>
CareMaster Team
</div>
