 <!DOCTYPE html>
<html lang="en"> 
<head> 
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1 maximum-scale=1, user-scalable=no">
  <!-- .BOOTSTRAP STYLESHEET -->
  <link rel="stylesheet" href="{{ URL::asset('items/bootstrap-3.3.5/css/bootstrap.css') }}">
  <!-- .CUSTOM STYLESHEET -->
  <link rel="stylesheet" href="{{ URL::asset('items/bootstrap-3.3.5/css/style.css') }}">
  <title>Drive</title>
</head>

<body class="inboxbody">
  <div class="container">
    <div class="row">
      <div class="col-sm-3 col-md-2">
        <div class="btn-group">
          <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
            Mail <span class="caret"></span>
          </button>
            <ul class="dropdown-menu" role="menu">
              <li><a href="#">Mail</a></li>
              <li><a href="#">Contacts</a></li>
              <li><a href="#">Tasks</a></li>
            </ul>
        </div>
      </div>
      <div class="col-sm-9 col-md-10">
        <!-- Split button -->
        <div class="btn-group">
          <button type="button" class="btn btn-default">
            <div class="checkbox" style="margin: 0;">
              <label>
              <input type="checkbox">
              </label>
            </div>
          </button>
          <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
            <span class="caret"></span><span class="sr-only">Toggle Dropdown</span>
          </button>
          <ul class="dropdown-menu" role="menu">
            <li><a href="#">All</a></li>
            <li><a href="#">None</a></li>
            <li><a href="#">Read</a></li>
            <li><a href="#">Unread</a></li>
            <li><a href="#">Starred</a></li>
            <li><a href="#">Unstarred</a></li>
          </ul>
        </div>
        <button type="button" class="btn btn-default" data-toggle="tooltip" title="Refresh">
          <span class="glyphicon glyphicon-refresh"></span>
        </button>
        <!-- Single button -->
        <div class="btn-group">
          <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
            More <span class="caret"></span>
          </button>
          <ul class="dropdown-menu" role="menu">
            <li><a href="#">Mark all as read</a></li>
            <li class="divider"></li>
            <li class="text-center"><small class="text-muted">Select messages to see more actions</small></li>
          </ul>
        </div>
        <div class="pull-right">
          <span class="text-muted"><b>1</b>–<b>50</b> of <b>277</b></span>
          <div class="btn-group btn-group-sm">
            <button type="button" class="btn btn-default">
            <span class="glyphicon glyphicon-chevron-left"></span>
            </button>
            <button type="button" class="btn btn-default">
            <span class="glyphicon glyphicon-chevron-right"></span>
            </button>
          </div>
        </div>
      </div>
    </div>
    <hr />
    <div class="row">
      <div class="col-sm-3 col-md-2">
        <a href="#" class="btn btn-danger btn-sm btn-block" role="button">COMPOSE</a>
        <hr />
        <ul class="nav nav-pills nav-stacked">
          <li class="active"><a href="#home"><span class="badge pull-right">42</span> Inbox </a></li>
          <li><a href=""><span class="notif pull-right">2</span>Starred</a></li>
          <li><a href="">Important</a></li>
          <li><a href="">Sent Mail</a></li>
          <li><a href=""><span class="badge pull-right">3</span>Drafts</a></li>
        </ul>
      </div>
      <div class="col-sm-9 col-md-10">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs">
          <li class="active"><a href="#inbox" data-toggle="tab"><span class="glyphicon glyphicon-inbox">
          </span>Inbox</a></li>
          <li><a href="#sent" data-toggle="tab"><span class="glyphicon glyphicon-user"></span>
              Sent Mail</a></li>
          <li><a href="#messages" data-toggle="tab"><span class="glyphicon glyphicon-tags"></span>
              Messages</a></li>
          <li><a href="#settings" data-toggle="tab"><span class="glyphicon glyphicon-plus no-margin">
          </span></a></li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
          <div class="tab-pane fade in active" id="inbox">
            <div class="list-group">
              @foreach($messages as $message)
                @if ($message->is_read === 0)
                <!-- If message is unread -->
                <a data-toggle="tab" class="list-group-item" id="msg">
                @else
                <!-- If read -->
                <a data-toggle="tab" class="list-group-item read" id="msg">
                @endif
                  <div class="checkbox">
                    <label><input type="checkbox"></label>
                  </div>
                  <span class="glyphicon glyphicon-star-empty"></span>
                  @foreach ($message->conversation->messages->chunk(3) as $chunk)
                    @foreach ($chunk as $msg)
                      @if ($msg->user->role === "instructor")
                        <span class="flname" id="from" name="from">From: {{ $msg->user->instructor->first_name }} {{ $msg->user->instructor->last_name }}</span>
                      @elseif ($msg->user->role === "learner")
                        <span class="flname">{{ $msg->user->learner->first_name }} {{ $msg->user->learner->last_name }}</span>
                      @endif
                    @endforeach
                  @endforeach
                  </hr>
                  <span class="subject">{{ $message->conversation->subject }}</span>
                  @foreach ($message->conversation->messages->chunk(3) as $chunk)
                    @foreach ($chunk as $msg)
                      <span class="text-muted" id="content">{{ $msg->message_content }}</span>
                      @if ($msg->created_at->format('d/m/y') === date("d/m/y"))
                        <!-- If message was recieved today -->
                        <span class="badge">{{ $msg->created_at->format('h:i A') }}</span>
                      @else
                        <!-- If message was not recieved today -->
                        <span class="badge">{{ $msg->created_at->format('d/m/y h:i A') }}</span>
                      @endif
                    @endforeach
                  @endforeach
                  <button type="button" class="btn btn-default btn-xs" id="ray" data-from="Rayees">Reply</button>
                  <!-- <button type="button" class="btn btn-default btn-xs" id="ray" data-target="#replyModal" data-toggle="modal" data-from="Rayees">Reply</button> -->
                  <!-- <span class="pull-right"><span class="glyphicon glyphicon-paperclip"></span></span> -->
                </a>
              @endforeach
            </div>
          </div>
          <div class="tab-pane fade in" id="sent">
            <div class="list-group">
              @foreach($sent_messages as $sent)
                <a class="list-group-item">
                  <div class="checkbox">
                    <label><input type="checkbox"></label>
                  </div>
                  @foreach ($sent->conversation->users->chunk(3) as $chunk)
                    @foreach ($chunk as $sent_to)
                      @if ($sent_to->role === "instructor")
                        <span class="flname">To: {{ $sent_to->instructor->first_name }} {{ $sent_to->instructor->last_name }}</span>
                      @elseif ($sent_to->role === "learner")
                        <span class="flname">To: {{ $sent_to->learner->first_name }} {{ $sent_to->learner->last_name }}</span>
                      @endif
                    @endforeach
                  @endforeach
                  <span class="subject">{{ $sent->conversation->subject }}</span>
                  <span class="text-muted">{{ $sent->message_content }}</span>
                </a>
              @endforeach
            </div>
          </div>
          <div class="tab-pane fade in" id="messages">
            This tab is empty.
          </div>
          <div class="tab-pane fade in" id="settings">
            This tab is empty.
          </div>
        </div>
      </div>
    </div>
  </div>

  <!--modal email message-->
  <div tabindex="-1" class="modal fade" id="replyModal" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button class="close" aria-hidden="true" type="button" data-dismiss="modal">×</button>
          <h1 class="text-center">Fill in the Details Below </h1>
        </div>
        <br />
        </hr>
        <form class="form-horizontal" name="replyfrom" method="POST" action="/drive/inbox/reply-message">
          {!! csrf_field() !!}
          <!-- <div class="form-group">
            <label class="control-label col-md-4" for="subject">Subject</label>
            <div class="col-md-6">
            <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject"/>
            </div>
          </div> -->
          <div class="form-group">
            <label class="control-label col-md-4" for="comment">Message</label>
            <div class="col-md-6">
              <textarea rows="6" class="form-control" id="message" name="message" placeholder="Type your reply message here"></textarea>
            </div>
          </div>
          <!-- Hidden form field for recipient's user_id -->
          <input id="recipient" class="form-control">
          <div class="form-group">
            <div class="col-md-6">
              <button type="submit" value="Submit" class="btn btn-primary pull-right" id="send_btn"><span class="glyphicon glyphicon-envelope"></span> Submit Email</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div> <!-- /.modal email message -->

  <script type="text/javascript" src="items/bootstrap-3.3.5/js/jquery-1.11.3.js"></script>
  <script src="items/bootstrap-3.3.5/js/bootstrap.js"></script>
  <script type="text/javascript">
  $(document).ready(function() {
    $(document).on('click', '#ray', function() {
      var recipient = $(this).data('from')
      // alert($(this).data('from'));
      $('#replyModal').modal('show');
      $('#recipient').val(recipient)
    });
  });

  </script>
</body>
</html>