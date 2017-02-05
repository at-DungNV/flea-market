<ol class="breadcrumb">
  @foreach ($crumbs as $crumb)
  <li>
    @if ($crumb != end($crumbs))
      <a href="{{ url($crumb) }}">{{ ucfirst($crumb) }}</a>
    @else
      {{ ucfirst($crumb) }}
    @endif
  </li>
  @endforeach
</ol>
