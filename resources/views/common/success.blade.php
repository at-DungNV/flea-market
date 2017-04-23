@if (session()->has('message'))
    <div class="alert alert-success" style="margin-top: 50px;">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <ul>
          <li>{{ session('message') }}</li>
        </ul>
    </div>
@endif
