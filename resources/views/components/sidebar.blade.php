<div class="list-group">
  @if (Auth::user()->roles == 'ADMIN')
  <a href="{{route('admin-dashboard')}}" class="list-group-item list-group-item-action active">Dashboard</a>
  <a href="{{route('games.create')}}" class="list-group-item list-group-item-action">Games</a>
  <a href="{{route('games.listgame')}}" class="list-group-item list-group-item-action">List Games</a>
  <a href="{{route('transaction.index') }}" class="list-group-item list-group-item-action">Transaction</a>
  <a href="{{ route('user.index') }}" class="list-group-item list-group-item-action">User</a>
  @endif
  @if (Auth::user()->roles == 'USER')
  <a href="{{route('dashboard')}}" class="list-group-item list-group-item-action active">Dashboard</a>
  @endif
</div>