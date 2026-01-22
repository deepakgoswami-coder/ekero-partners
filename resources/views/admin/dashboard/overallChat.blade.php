@extends('admin.layouts.main')

@section('title', 'Overall Conversations')

@section('content')
<style>
    /* Content wrapper ko overflow se bachane ke liye */
    .content-wrapper { padding: 0 !important; } 
    
    .chat-main-container {
        display: flex;
        height: calc(100vh - 120px); /* Adjust based on your header/footer height */
        background: #fff;
        margin: 0;
        overflow: hidden;
    }

    /* Left Sidebar */
    .chat-contacts-sidebar {
        width: 350px;
        flex-shrink: 0;
        border-right: 1px solid #dee2e6;
        display: flex;
        flex-direction: column;
        background: #f8f9fa;
    }

    .contacts-header {
        padding: 15px;
        background: #343a40;
        color: #fff;
        font-weight: bold;
    }

    .contacts-list {
        flex: 1;
        overflow-y: auto;
    }

    /* Right Chat Window */
    .chat-view-area {
        flex: 1;
        display: flex;
        flex-direction: column;
        background: #e5ddd5; /* WhatsApp background color */
        position: relative;
    }

    .chat-header-info {
        padding: 10px 20px;
        background: #fff;
        border-bottom: 1px solid #dee2e6;
        z-index: 10;
    }

    .chat-messages-box {
        flex: 1;
        padding: 20px;
        overflow-y: auto;
        display: flex;
        flex-direction: column;
    }

    /* Bubbles Logic */
    .msg-bubble {
        max-width: 70%;
        padding: 8px 15px;
        border-radius: 15px;
        margin-bottom: 10px;
        position: relative;
        font-size: 14px;
        box-shadow: 0 1px 2px rgba(0,0,0,0.1);
    }

    .received {
        background: #fff;
        align-self: flex-start;
        border-bottom-left-radius: 2px;
    }

    .sent {
        background: #dcf8c6;
        align-self: flex-end;
        border-bottom-right-radius: 2px;
    }

    /* Sidebar Active Item */
    .chat-user-tab {
        border-bottom: 1px solid #eee;
        transition: 0.3s;
        cursor: pointer;
        padding: 12px 15px;
    }

    .chat-user-tab.active {
        background: #fff;
        border-left: 4px solid #007bff;
    }

    .chat-user-tab:hover { background: #eef2f7; }

    /* Footer Fix */
    footer { display: none !important; } /* Chat page par footer aksar UI kharab karta hai */
</style>

<div class="chat-main-container app-content content">
    <div class="chat-contacts-sidebar">
        <div class="contacts-header">
            Active Chats
        </div>
        <div class="contacts-list">
            @foreach($conversations as $index => $convo)
            <div class="chat-user-tab {{ $index == 0 ? 'active' : '' }}" 
                 onclick="switchChat('chat-{{ $index }}', this)">
                <div class="d-flex justify-content-between">
                    <span class="font-weight-bold text-dark text-truncate">{{ $convo->userOneDetails->name }} & {{ $convo->userTwoDetails->name }}</span>
                </div>
                <div class="small text-muted text-truncate">
                    {{ $convo->combined_chats->last()->chat ?? 'Attachment shared' }}
                </div>
                <small style="font-size: 10px;" class="text-primary">
                    {{ \Carbon\Carbon::parse($convo->last_time)->diffForHumans() }}
                </small>
            </div>
            @endforeach
        </div>
    </div>

    <div class="chat-view-area">
        @foreach($conversations as $index => $convo)
        <div id="chat-{{ $index }}" class="chat-pane h-100 {{ $index == 0 ? '' : 'd-none' }}" style="display: flex; flex-direction: column;">
            
            <div class="chat-header-info">
                <h6 class="m-0 font-weight-bold">{{ $convo->userOneDetails->name }} <span class="text-muted">x</span> {{ $convo->userTwoDetails->name }}</h6>
                <small class="text-muted small">Conversation History</small>
            </div>

            <div class="chat-messages-box">
                @foreach($convo->combined_chats as $msg)
                    @php 
                        // Logic to determine if message is sent by the first user in the pair
                        $isLeft = ($msg->sender_id == $convo->user_one);
                    @endphp
                    
                    <div class="msg-bubble {{ $isLeft ? 'received' : 'sent' }}">
                        <div class="font-weight-bold mb-1" style="font-size: 11px; color: {{ $isLeft ? '#007bff' : '#28a745' }};">
                            {{ $isLeft ? $convo->userOneDetails->name : $convo->userTwoDetails->name }}
                        </div>
                        
                        @if($msg->chat)
                            <div class="msg-text text-dark">{{ $msg->chat }}</div>
                        @endif

                        @if($msg->file)
                            <div class="msg-file mt-2">
                                @if(in_array(strtolower($msg->file_type), ['image', 'png', 'jpg', 'jpeg']))
                                    <img src="{{ asset('storage/'.$msg->file) }}" class="img-fluid rounded border" style="max-height: 200px; display: block;">
                                @else
                                    <a href="{{ asset('storage/'.$msg->file) }}" target="_blank" class="btn btn-xs btn-outline-secondary">
                                        <i class="fa fa-file"></i> View File
                                    </a>
                                @endif
                            </div>
                        @endif

                        <div class="text-right mt-1" style="font-size: 9px; opacity: 0.6;">
                            {{ \Carbon\Carbon::parse($msg->created_at)->format('h:i A') }}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        @endforeach
    </div>
</div>

<script>
    function switchChat(chatId, element) {
        // Hide All Panes
        document.querySelectorAll('.chat-pane').forEach(p => p.classList.add('d-none'));
        
        // Show Current
        const selectedPane = document.getElementById(chatId);
        selectedPane.classList.remove('d-none');

        // Sidebar active state
        document.querySelectorAll('.chat-user-tab').forEach(t => t.classList.remove('active'));
        element.classList.add('active');

        // Scroll to bottom
        scrollToBottom(selectedPane);
    }

    function scrollToBottom(pane) {
        const msgBox = pane.querySelector('.chat-messages-box');
        if(msgBox) msgBox.scrollTop = msgBox.scrollHeight;
    }

    window.onload = function() {
        const firstPane = document.querySelector('.chat-pane:not(.d-none)');
        if(firstPane) scrollToBottom(firstPane);
    };
</script>
@endsection