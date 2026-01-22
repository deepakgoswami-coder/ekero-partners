@extends('leader.layouts.main')

@section('title', 'Leader Chat')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<div class="app-content content ">
    <div class="content-wrapper container-xxl p-0">
        <div class="content-body">
            <div class="row g-0 chat-application shadow rounded overflow-hidden bg-white">
                <div class="col-md-4 col-lg-3 bg-white border-end" style="height: 600px;">
                    <div class="p-3 border-bottom bg-light">
                        <h5 class="mb-0">My Coaches</h5>
                    </div>
                    <div class="leader-list-container" style="height: 540px; overflow-y: auto;">
                        <ul class="list-group list-group-flush" id="coach-list">
                            @forelse($coaches as $coach)
                                <li class="list-group-item list-group-item-action coach-item p-3 border-bottom" 
                                    data-id="{{ $coach->id }}" data-name="{{ $coach->name }}" style="cursor: pointer;">
                                    <div class="d-flex align-items-center">
                                        <div class="avatar bg-light-primary me-3 p-1 rounded-circle text-center" style="width: 40px; height: 40px; line-height: 30px; background: #eee;">
                                            <span class="avatar-content"><strong>{{ strtoupper(substr($coach->name, 0, 1)) }}</strong></span>
                                        </div>
                                        <div class="w-100"><h6 class="mb-0">{{ $coach->name }}</h6></div>
                                    </div>
                                </li>
                            @empty
                                <li class="list-group-item text-center py-5">No coaches assigned</li>
                            @endforelse
                        </ul>
                    </div>
                </div>

                <div class="col-md-8 col-lg-9 bg-light d-flex flex-column" style="height: 600px;">
                    <div id="chat-header-info" class="p-3 border-bottom bg-primary text-white d-none">
                        <h5 class="mb-0 text-white" id="active-coach-name">Select a Coach</h5>
                    </div>

                    <div id="chat-box" class="flex-grow-1 p-3 overflow-auto d-flex flex-column chat-messages" style="background: #f8f9fa;">
                        <div class="text-center empty-chat mt-5">
                            <i class="fas fa-comments fa-4x text-muted mb-3"></i>
                            <p class="text-secondary">Please select a coach to start chatting</p>
                        </div>
                    </div>

                    <div id="file-preview-container" class="px-3 py-2 bg-white border-top d-none">
                        <div id="preview-wrapper" class="d-flex flex-wrap gap-2"></div>
                    </div>

                    <div id="chat-footer-area" class="p-3 bg-white border-top d-none">
                        <form id="chat-form" class="d-flex align-items-center" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="leader_id" id="active-coach-id">
                            
                            <input type="file" id="file-input" name="files[]" multiple class="d-none" accept="image/*,video/*,audio/*">
                            
                            <button type="button" class="btn btn-outline-secondary me-2" onclick="$('#file-input').click()">
                                <i class="fas fa-paperclip"></i>
                            </button>

                            <input type="text" name="message" id="message" class="form-control me-2" placeholder="Type your message..." autocomplete="off">
                            
                            <button type="submit" id="send-btn" class="btn btn-primary px-3 py-2">
                                <i class="fas fa-paper-plane"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .coach-item.active { background-color: #f0edff !important; border-left: 4px solid #7367f0; }
    .message { max-width: 70%; margin-bottom: 15px; padding: 10px 15px; border-radius: 12px; font-size: 0.9rem; position: relative; }
    .message-outgoing { align-self: flex-end; background: #7367f0; color: white; border-bottom-right-radius: 2px; }
    .message-incoming { align-self: flex-start; background: white; border: 1px solid #ddd; color: #333; border-bottom-left-radius: 2px; }
    .media-msg { width: 100%; max-width: 250px; border-radius: 8px; margin-top: 5px; display: block;}
    .chat-loading { display: flex; justify-content: center; align-items: center; height: 100%; flex-direction: column; }
    #preview-wrapper .preview-item { position: relative; width: 80px; height: 80px; border: 1px solid #ddd; border-radius: 5px; overflow: hidden; }
    #preview-wrapper img, #preview-wrapper video { width: 100%; height: 100%; object-fit: cover; }
    .remove-preview { position: absolute; top: 0; right: 0; background: rgba(255,0,0,0.7); color: white; border: none; font-size: 10px; padding: 2px 5px; cursor: pointer; z-index: 10; }
</style>
@endsection

@section('script')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        let selectedFiles = [];

        // Coach Select Logic
        $(document).on('click', '.coach-item', function() {
            const coachId = $(this).data('id');
            const coachName = $(this).data('name');
            $('.coach-item').removeClass('active');
            $(this).addClass('active');
            $('#chat-header-info, #chat-footer-area').removeClass('d-none');
            $('#active-coach-name').text(coachName);
            $('#active-coach-id').val(coachId);
            loadMessages(coachId);
        });

        // Load Messages
        function loadMessages(coachId) {
            $('#chat-box').html('<div class="chat-loading"><div class="spinner-border text-primary"></div></div>');
            $.ajax({
                url: "{{ route('leader.coach.chat.list') }}", 
                type: 'GET',
                data: { coach_id: coachId },
                success: function(response) {
                    $('#chat-box').empty();
                    if(response.messages && response.messages.length > 0) {
                        response.messages.forEach(msg => appendMessage(msg));
                    } else {
                        $('#chat-box').html('<div class="text-center text-muted mt-5 no-msg-text">No messages yet.</div>');
                    }
                    scrollChatToBottom();
                }
            });
        }

        // File Preview
        $('#file-input').on('change', function(e) {
            const files = Array.from(e.target.files);
            files.forEach(file => {
                selectedFiles.push(file);
                const reader = new FileReader();
                reader.onload = function(f) {
                    let html = `<div class="preview-item" data-name="${file.name}">
                                    <button type="button" class="remove-preview">X</button>`;
                    if (file.type.startsWith('image/')) {
                        html += `<img src="${f.target.result}">`;
                    } else {
                        html += `<div class="p-2 text-center" style="font-size:10px">${file.name.substring(0,10)}...</div>`;
                    }
                    html += `</div>`;
                    $('#preview-wrapper').append(html);
                }
                reader.readAsDataURL(file);
            });
            $('#file-preview-container').removeClass('d-none');
            $(this).val('');
        });

        $(document).on('click', '.remove-preview', function() {
            const fileName = $(this).parent().data('name');
            selectedFiles = selectedFiles.filter(file => file.name !== fileName);
            $(this).parent().remove();
            if (selectedFiles.length === 0) $('#file-preview-container').addClass('d-none');
        });

        function appendMessage(msg) {
            $('.no-msg-text, .empty-chat').remove();
            let isMe = (msg.sender_id == "{{ Auth::id() }}");
            let typeClass = isMe ? 'message-outgoing' : 'message-incoming';
            let contentHtml = msg.chat ? `<div>${msg.chat}</div>` : '';
            if(msg.file) contentHtml += renderFile(msg.file, msg.file_type);

            $('#chat-box').append(`<div class="message ${typeClass}">${contentHtml}</div>`);
            scrollChatToBottom();
        }

        function renderFile(path, type) {
            let url = `{{ asset('storage') }}/${path}`;
            if(type === 'video') return `<video controls class="media-msg"><source src="${url}"></video>`;
            if(type === 'image') return `<img src="${url}" class="media-msg">`;
            if(type === 'audio') return `<audio controls class="media-msg" style="width:200px"><source src="${url}"></audio>`;
            return `<a href="${url}" class="d-block text-info" target="_blank">View Attachment</a>`;
        }

        function scrollChatToBottom() {
            $('#chat-box').scrollTop($('#chat-box')[0].scrollHeight);
        }

        $('#chat-form').on('submit', function(e) {
            e.preventDefault();
            let formData = new FormData(this);
            
            selectedFiles.forEach((file, index) => {
                formData.append('files[' + index + ']', file);
            });

            if(!$('#message').val().trim() && selectedFiles.length === 0) return;

            $('#send-btn').prop('disabled', true);

            $.ajax({
                url: "{{ route('leader.coach.send.message') }}", 
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    loadMessages($('#active-coach-id').val()); 
                    $('#message').val('');
                    selectedFiles = [];
                    $('#preview-wrapper').empty();
                    $('#file-preview-container').addClass('d-none');
                    $('#send-btn').prop('disabled', false);
                },
                error: function() {
                    alert("Upload failed.");
                    $('#send-btn').prop('disabled', false);
                }
            });
        });
    });
</script>
@endsection