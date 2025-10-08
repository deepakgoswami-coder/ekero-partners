@extends('admin.layouts.main')

@section('title', 'Chat')

@section('content')
<div class="app-content content chat-application" style="height:90vh;">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>

    <div class="content-area-wrapper container-xxl p-0 d-flex h-100">

        <!-- Sidebar: User List --> 
        <div class="sidebar-left border-end" style="width:280px; overflow-y:auto;">
            <div class="sidebar p-2">
                <div class="chat-fixed-search mb-2">
                    <div class="input-group input-group-merge w-100">
                        <span class="input-group-text round"><i data-feather="search" class="text-muted"></i></span>
                        <input type="text" class="form-control round" id="chat-search" placeholder="Search user..." />
                    </div>
                </div>
              <div id="users-list">
                  <h6 class="text-muted mt-3">Filtered Users</h6>
                  <ul class="list-unstyled" id="filtered-users"></ul>
    <h6 class="text-muted">All Users</h6>
    <ul class="list-unstyled" id="all-users">
        @foreach($users as $user)
            <li class="chat-user d-flex align-items-center p-2 mb-1 cursor-pointer"
                data-id="{{ $user->id }}" style="border-radius:8px;">
                <span class="avatar me-2">
                    <img src="{{ $user->profile ? asset('uploads/' . $user->profile) : asset('admin/icons/user.png') }}"
                        height="40" width="40" class="rounded-circle" />
                </span>
                <div class="flex-grow-1">
                    <h6 class="mb-0">{{ $user->name }}</h6>
                </div>
            </li>
        @endforeach
    </ul>

    
</div>

            </div>
        </div>

        <div class="content-right flex-grow-1 d-flex flex-column" style="height:100%;">
            
            <div class="chat-header d-flex align-items-center border-bottom p-2" style="min-height:70px;">
                <div class="avatar me-2">
                    <img id="chat-user-avatar" src="{{ asset('admin/icons/user.png') }}" height="50" width="50" class="rounded-circle" />
                    <span class="avatar-status-online"></span>
                </div>
                <h5 id="chat-user-name" class="mb-0">Select a user</h5>
            </div>

            <div class="chat-messages flex-grow-1 p-3 overflow-auto" id="chat-box"
     style="scroll-behavior:smooth; 
            background: url('{{ asset('web/assests/image/chat-backround.jpg') }}') repeat; 
            background-size: contain;">
    <div class="text-center text-muted mt-5">Select a user to start chat</div>
</div>

           <form id="chat-form" class="d-flex p-2 border-top align-items-center" style="background:#fff;">
    @csrf
    <input type="hidden" name="receiver_id" id="receiver_id">

    <!-- file button (hidden input, visible button) -->
    <label for="file" class="btn btn-light rounded-pill me-2 mb-0" title="Attach file">
        <i data-feather="paperclip"></i>
    </label>
    <input type="file" name="file" id="file" class="d-none" accept=".jpg,.jpeg,.png,.gif,.webp,.pdf,.doc,.docx,.xls,.xlsx,.csv,.mp4,.mov,.mp3,.wav,.zip,.rar" />

    <input type="text" name="message" id="message" class="form-control me-2 rounded-pill" placeholder="Type your message..." >
    <button type="submit" class="btn btn-primary rounded-pill px-4">Send</button>
</form>

        </div>
    </div>
</div>
@endsection
@section('script')
<script src="{{ asset('admin/app-assets/vendors/js/vendors.min.js') }}"></script>
<script src="{{ asset('admin/app-assets/js/core/app-menu.js') }}"></script>
<script src="{{ asset('admin/app-assets/js/core/app.js') }}"></script>

<script>
let currentUserId = null;

// CSRF for Ajax
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') || $('input[name="_token"]').val()
    }
});

// Helpers
function formatTime(dateString) {
    let date = new Date(dateString);
    return date.toLocaleTimeString([], {hour:'2-digit', minute:'2-digit'});
}

function humanFileSize(bytes) {
    if (!bytes) return '';
    const i = Math.floor(Math.log(bytes) / Math.log(1024));
    const sizes = ['B','KB','MB','GB','TB'];
    return (bytes / Math.pow(1024, i)).toFixed((i===0?0:1)) + ' ' + sizes[i];
}

function renderAttachmentHtml(msg) {
    if (!msg.file_url) return '';
    const type = msg.file_type || '';
    const name = msg.file_name || 'file';
    const size = msg.file_size ? humanFileSize(msg.file_size) : '';

    if (type.startsWith('image')) {
        return `<div class="mt-2">
                    <a href="${msg.file_url}" target="_blank">
                        <img src="${msg.file_url}" style="max-width:220px;border-radius:8px;display:block;" />
                    </a>
                    <small class="d-block text-muted">${name} ${size}</small>
                </div>`;
    }

    if (type === 'application/pdf') {
        return `<div class="mt-2">
                    <a href="${msg.file_url}" target="_blank" class="btn btn-sm btn-outline-secondary">View PDF</a>
                    <small class="d-block text-muted">${name} ${size}</small>
                </div>`;
    }

    return `<div class="mt-2">
                <a href="${msg.file_url}" target="_blank" download class="btn btn-sm btn-outline-secondary">Download ${name}</a>
                <small class="d-block text-muted">${size}</small>
            </div>`;
}

// Load messages
function loadMessages() {
    if (!currentUserId) return;
    $.get('/admin/chat/' + currentUserId, function(messages) {
        let html = '';
        messages.forEach(msg => {
            let isMe = msg.sender_id === {{ Auth::id() }};
            let align = isMe ? 'justify-content-end' : 'justify-content-start';
            let bubbleStyle = isMe 
                ? "border-radius:15px 15px 0 15px; background:#0d6efd;color:#fff;" 
                : "border-radius:15px 15px 15px 0; background:#f1f1f1;color:#000;";
            
            html += `
                <div class="d-flex ${align} mb-2">
                    <div class="p-2" style="max-width:70%; ${bubbleStyle}">
                        <div>${msg.message ? msg.message.replace(/\n/g, '<br/>') : ''}</div>
                        ${renderAttachmentHtml(msg)}
                        <small class="text-muted d-block text-end" style="font-size:10px;">${formatTime(msg.created_at)}</small>
                    </div>
                </div>
            `;
        });
        $('#chat-box').html(html);
        $('#chat-box').scrollTop($('#chat-box')[0].scrollHeight);
        feather.replace(); // refresh feather icons
    });
}

// Click user
$(document).on('click', '.chat-user', function() {
    currentUserId = $(this).data('id');
    $('#receiver_id').val(currentUserId);
    $('#chat-user-name').text($(this).find('h6').text());
    let avatarSrc = $(this).find('img').attr('src');
    $('#chat-user-avatar').attr('src', avatarSrc);
    loadMessages();
});

// Auto reload every 5s
setInterval(loadMessages, 5000);

// Send message (with file support)
$('#chat-form').submit(function(e) {
    e.preventDefault();
    if (!$('#receiver_id').val()) {
        alert('Select a user to send message.');
        return;
    }

    var form = document.getElementById('chat-form');
    var formData = new FormData(form);

    // Add CSRF token if missing
    if (!$('input[name="_token"]').val()) {
        formData.append('_token', $('meta[name="csrf-token"]').attr('content'));
    }

    $.ajax({
        url: '/admin/chat/send',
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function(res) {
            $('#message').val('');
            $('#file').val('');
            loadMessages();
        },
        error: function(xhr) {
            console.error(xhr.responseJSON);
            alert('Failed to send. Check console for details.');
        }
    });
});
</script>
<script>
        $(window).on('load', function () {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
        })
    </script>
<script>
document.addEventListener("DOMContentLoaded", function () {
    const searchInput = document.getElementById("chat-search");
    const allUsersList = document.getElementById("all-users");
    const filteredUsersList = document.getElementById("filtered-users");

    searchInput.addEventListener("keyup", function () {
        let filter = searchInput.value.toLowerCase();

        // reset filtered list
        filteredUsersList.innerHTML = "";

        // loop through all users
        document.querySelectorAll("#all-users .chat-user").forEach(function (user) {
            let name = user.querySelector("h6").innerText.toLowerCase();

            if (filter !== "" && name.includes(filter)) {
                // clone matched user into filtered list
                filteredUsersList.appendChild(user.cloneNode(true));
                user.style.display = "none"; // hide from original list
            } else {
                user.style.display = "flex"; // restore in original list
            }
        });
    });
});
</script>



<style>
/* Scrollbar */
#chat-box::-webkit-scrollbar { width:6px; }
#chat-box::-webkit-scrollbar-thumb { background-color: rgba(0,0,0,0.2); border-radius:3px; }

/* Hover for sidebar users */
.chat-user:hover { background:#e9ecef; transition:0.2s; cursor:pointer; }
</style>
@endsection
