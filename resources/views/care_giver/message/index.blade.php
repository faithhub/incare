@extends('care_giver.layouts.app')
@section('care_giver')
<div class="row">
  <div class="col">
    <div class="dashboard-message-wrapper d-flex">
      <div class="message-sidebar">
        <div class="message-search">
          <div class="contact-form-action">
            <form action="#">
              <div class="form-group mb-0">
                <input class="form-control" type="text" placeholder="Search...">
                <button type="submit" class="submit-btn "><i class="la la-search"></i></button>
              </div>
            </form>
          </div>
        </div><!-- message-search -->
        <div class="message-inbox-item">
          <div class="mess__body">
            <a href="#" class=" d-block message-inbox">
              <div class="mess__item">
                <div class="avatar dot-status">
                  <img src="{{ asset('web/images/small-team1.jpg') }}" alt="Michelle Moreno">
                </div>
                <div class="content">
                  <h4 class="widget-title">Harvey Specter</h4>
                  <p class="text">Oh yeah, did Michael Jordan tell you that?</p>
                  <span class="time color-text-3 font-size-12">2 days ago</span>
                </div>
              </div>
            </a>
          </div><!-- end mess__body -->
        </div><!-- end message-inbox-item -->
      </div><!-- message-sidebar -->
      <div class="message-content flex-grow-1">
        <div class="message-header">
          <div class="mess__item justify-content-between align-items-center">
            <div class="d-flex">
              <div class="avatar">
                <img src="{{ asset('web/images/small-team1.jpg') }}" alt="Michelle Moreno">
              </div>
              <div class="content">
                <h4 class="widget-title font-size-15 mb-0">Harvey Specter</h4>
                <span class="time color-text font-size-14">Online</span>
              </div>
            </div>
            <div>
              <ul class="info-list">
                <li><a href="#"><i class="la la-trash" data-toggle="tooltip" data-placement="top" title="Delete Conversation"></i></a></li>
              </ul>
            </div>
          </div><!-- mess__item -->
        </div><!-- message-header -->
        <div class="conversation-wrap">
          <div class="conversation-box">
            <div class="message-time">
              <span>Today</span>
            </div>
            <div class="conversation-item msg-reply">
              <div class="mess__body">
                <div class="mess__item">
                  <div class="avatar">
                    <img src="images/small-team2.jpg" alt="Michelle Moreno">
                  </div>
                  <div class="content">
                    <p class="text">Hi John, I just wanted to let you know that project is finished</p>
                    <span class="time">8:19 AM</span>
                  </div>
                </div><!-- mess__item -->
              </div><!-- mess__body -->
            </div><!-- conversation-item -->
            <div class="conversation-item msg-sent">
              <div class="mess__body">
                <div class="mess__item">
                  <div class="content">
                    <p class="text">Hi Daniel! I'm actually on vacation 🏖️ until Sunday so I can't check it now 😎</p>
                    <span class="time">12:4 PM <i class="fa fa-check"></i></span>
                  </div>
                  <div class="avatar">
                    <img src="images/small-team1.jpg" alt="Michelle Moreno">
                  </div>
                </div><!-- mess__item -->
              </div><!-- mess__body -->
            </div><!-- conversation-item -->
            <div class="conversation-item msg-reply">
              <div class="mess__body">
                <div class="mess__item">
                  <div class="avatar">
                    <img src="images/small-team2.jpg" alt="Michelle Moreno">
                  </div>
                  <div class="content">
                    <p class="text">Hi John, I just wanted to let you know that project is finished</p>
                    <span class="time">8:19 AM</span>
                  </div>
                </div><!-- mess__item -->
              </div><!-- mess__body -->
            </div><!-- conversation-item -->
            <div class="conversation-item msg-sent">
              <div class="mess__body">
                <div class="mess__item">
                  <div class="content">
                    <p class="text">Hi Daniel! I'm actually on vacation 🏖️ until Sunday so I can't check it now 😎</p>
                    <span class="time">12:4 PM <i class="fa fa-check"></i></span>
                  </div>
                  <div class="avatar">
                    <img src="images/small-team1.jpg" alt="Michelle Moreno">
                  </div>
                </div><!-- mess__item -->
              </div><!-- mess__body -->
            </div><!-- conversation-item -->
            <div class="conversation-item msg-reply">
              <div class="mess__body">
                <div class="mess__item">
                  <div class="avatar">
                    <img src="images/small-team2.jpg" alt="Michelle Moreno">
                  </div>
                  <div class="content">
                    <p class="text">Hi John, I just wanted to let you know that project is finished</p>
                    <span class="time">8:19 AM</span>
                  </div>
                </div><!-- mess__item -->
              </div><!-- mess__body -->
            </div><!-- conversation-item -->
            <div class="conversation-item msg-sent">
              <div class="mess__body">
                <div class="mess__item">
                  <div class="content">
                    <p class="text">Hi Daniel! I'm actually on vacation 🏖️ until Sunday so I can't check it now 😎</p>
                    <span class="time">12:4 PM <i class="fa fa-check"></i></span>
                  </div>
                  <div class="avatar">
                    <img src="images/small-team1.jpg" alt="Michelle Moreno">
                  </div>
                </div><!-- mess__item -->
              </div><!-- mess__body -->
            </div><!-- conversation-item -->
            <div class="conversation-item msg-reply">
              <div class="mess__body">
                <div class="mess__item">
                  <div class="avatar">
                    <img src="images/small-team2.jpg" alt="Michelle Moreno">
                  </div>
                  <div class="content">
                    <p class="text">Hi John, I just wanted to let you know that project is finished</p>
                    <span class="time">8:19 AM</span>
                  </div>
                </div><!-- mess__item -->
              </div><!-- mess__body -->
            </div><!-- conversation-item -->
            <div class="conversation-item msg-sent">
              <div class="mess__body">
                <div class="mess__item">
                  <div class="content">
                    <p class="text">Hi Daniel! I'm actually on vacation 🏖️ until Sunday so I can't check it now 😎</p>
                    <span class="time">12:4 PM <i class="fa fa-check"></i></span>
                  </div>
                  <div class="avatar">
                    <img src="images/small-team1.jpg" alt="Michelle Moreno">
                  </div>
                </div><!-- mess__item -->
              </div><!-- mess__body -->
            </div><!-- conversation-item -->
          </div><!-- conversation-box -->
        </div><!-- conversation-wrap -->
        <div class="message-reply-input">
          <div class="contact-form-action">
            <form method="post">
              <div class="input-box d-flex align-items-center">
                <div class="form-group flex-grow-1 mb-0">
                  <textarea class="message-control form-control mr-2" name="message" placeholder="Type a message" data-emojiable="true"></textarea>
                  <button type="submit" class="theme-btn submit-btn border-0">
                    <span class="la la-paper-plane"></span>
                  </button>
                </div>
                <div class="msg-action-wrap">
                  <div class="dropdown">
                    <button class="dropdown-toggle send-file icon-element" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="la la-paperclip"></i>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                      <a class="dropdown-item" href="#" data-toggle="tooltip" data-placement="top" title="File"><i class="la la-file icon-element"></i></a>
                      <a class="dropdown-item" href="#" data-toggle="tooltip" data-placement="top" title="Camera"><i class="la la-camera icon-element"></i></a>
                      <a class="dropdown-item" href="#" data-toggle="tooltip" data-placement="top" title="Photo"><i class="la la-photo icon-element"></i></a>
                      <a class="dropdown-item" href="#" data-toggle="tooltip" data-placement="top" title="Audio"><i class="la la-music icon-element"></i></a>
                      <a class="dropdown-item" href="#" data-toggle="tooltip" data-placement="top" title="Video"><i class="la la-video icon-element"></i></a>
                      <a class="dropdown-item" href="#" data-toggle="tooltip" data-placement="top" title="Location"><i class="la la-map icon-element"></i></a>
                    </div>
                  </div>
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