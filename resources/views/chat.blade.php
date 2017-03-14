@extends('layouts.app')

@section('chat')
    <div class="container">
      <li>
        <a href="{{ route('logout') }}"
          onclick="event.preventDefault();
          document.getElementById('logout-form').submit();">
          Sign Out <span class="glyphicon glyphicon-log-out pull-right"></span>
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          {{ csrf_field() }}
        </form>
      </li>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Chatroom
                        <span class="badge pull-right">@{{ usersInRoom.length }}</span>
                    </div>

                    <chat-log :messages="messages"></chat-log>
                    <chat-composer v-on:messagesent="addMessage"></chat-composer>
                </div>
            </div>
        </div>
    </div>
@endsection

