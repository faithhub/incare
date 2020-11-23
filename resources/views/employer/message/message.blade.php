@extends('employer.layouts.app')
@section('user')
<div class="row">
  <div class="col">
    <div class="dashboard-message-wrapper d-flex">
      <div class="message-sidebar">
      </div><!-- message-sidebar -->
      <div class="message-content flex-grow-1 col-12">
        <div class="message-header">
          <div class="mess__item justify-content-between align-items-center">
            <div class="d-flex">
              <div class="avatar">
                <img src="{{ asset('uploads/profile_pictures/'.$user->avatar) }}" alt="{{$user->first_name}}">
              </div>
              <div class="content">
                <h4 class="widget-title font-size-15 mb-0">{{$user->first_name}} {{$user->last_name}}</h4>
                <span class="time color-text font-size-14">Online</span>
              </div>
            </div>
          </div><!-- mess__item -->
        </div><!-- message-header -->
        <div class="conversation-wrap">
          <div class="conversation-box">
            <div class="message-time">
              <span>Today</span>
            </div>
            @foreach($messages as $message)
            @if($message->sender_id == $user->id)
            <div class="conversation-item msg-reply">
              <div class="mess__body">
                <div class="mess__item">
                  <div class="avatar">
                    <img src="{{ asset('uploads/profile_pictures/'.$message->care_giver->avatar) }}" alt="{{$message->care_giver->first_name}}">
                  </div>
                  <div class="content">
                    <p class="text">{{$message->message}}</p>
                    <span class="time">{{ date('D, M j, Y \a\t g:ia', strtotime($message->created_at)) }}</span>
                  </div>
                </div><!-- mess__item -->
              </div><!-- mess__body -->
            </div><!-- conversation-item -->
            @else
            <div class="conversation-item msg-sent">
              <div class="mess__body">
                <div class="mess__item">
                  <div class="content">
                    <p class="text">{{$message->message}}</p>
                    <span class="time">{{ date('D, M j, Y \a\t g:ia', strtotime($message->created_at)) }}<i class="fa fa-check"></i></span>
                  </div>
                  <div class="avatar">
                    <img src="{{ asset('uploads/profile_pictures/'.Auth::user()->avatar) }}" alt="Michelle Moreno">
                  </div>
                </div><!-- mess__item -->
              </div><!-- mess__body -->
            </div><!-- conversation-item -->
            @endif
            @endforeach
          </div><!-- conversation-box -->
        </div><!-- conversation-wrap -->
        <div class="message-reply-input">
          <div class="contact-form-action">
            <form method="post" action="{{url('employer/message')}}">
              @csrf
              <div class="input-box d-flex align-items-center">
                <div class="form-group flex-grow-1 mb-0">
                  <input type="text" name="care_giver_id" value="{{$user->id}}" hidden />
                  <textarea class="message-control form-control mr-2" name="message" placeholder="Type a message" data-emojiable="true"></textarea>
                  <button type="submit" class="theme-btn submit-btn border-0">
                    <span class="la la-paper-plane"></span>
                  </button>
                </div>
              </div><!-- input-box -->
            </form>
          </div><!-- end contact-form-action -->
        </div><!-- message-reply-input -->
      </div><!-- message-content -->
    </div><!-- end dashboard-message-wrapper -->
  </div><!-- end col -->
</div><!-- end row -->
@endsection