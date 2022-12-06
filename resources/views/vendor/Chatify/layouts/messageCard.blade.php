{{-- -------------------- The default card (white) -------------------- --}}
@if ($viewType == 'default')
    @if ($from_id != $to_id)
        <div class="message-card" data-id="{{ $id }}">
            <p>{!! $message == null && $attachment != null && @$attachment[2] != 'file' ? $attachment[1] : nl2br($message) !!}
                <sub title="{{ $fullTime }}">{{ $time }}</sub>
                {{-- If attachment is a file --}}
                @if (@$attachment[2] == 'file')
                    <a href="{{ route(config('chatify.attachments.download_route_name'), ['fileName' => $attachment[0]]) }}"
                        style="color: #595959;" class="file-download">
                        <span class="fas fa-file"></span> {{ $attachment[1] }}</a>
                @endif
            </p>
            {{-- If attachment is an image --}}
            @if (@$attachment_type == 'image')

                @if (@abs($attachment_price) <= 0)
                    <div class="image-file chat-image"
                        style="margin-top:10px;width: 250px; height: 130px;background-image: url('{{ Chatify::getAttachmentUrl($attachment[0]) }}')">
                    </div>
                   
                @else
                    <div class="post-img-wrapper">

                        <div class="unclock-overlay">
                            <div class="unlock-btn-wrapepr unlock-text text-center " style="display:none;">
                                <h6>
                                    Confirm Unlock for ${{ $attachment_price }}
                                    Once you have unlocked this media.
                                </h6>
                                <h5>
                                    <form action="{{ route('payment') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="messageid" value="{{ $id }}">
                                        <input type="hidden" name="price" value="{{ $attachment_price }}">
                                        <input type="hidden" name="to" value="{{ $from_id }}">
                                        <input type="hidden" name="type" value="image">
                                        <input type="submit" class="unlock-btn" data-target="#exampleModalCenter3"
                                            value="Unlock">
                                    </form>
                                </h5>
                            </div>
                            <div class="unlock-btn-wrapepr locked-text">
                                <i class="fa-solid fa-lock"></i>
                                <button class="unlock-btn unlock_feed" data="10" data-toggle="modal"
                                    data-target="#exampleModalCenter3" value="22">
                                    Image Unlock for ${{ $attachment_price }}
                                </button>
                              
                            </div>
                        </div>
                        <img width="100%" height="153px"
                            src="{{ url('/storage/attachments/video.png') }}"alt="">
                    </div>
                @endif
            @endif




            @if (@$attachment_type == 'video')

                @if (@abs($attachment_price) <= 0)
                    <div class="image-file mediaopen"
                        style="margin-top:10px; 
                height: 130px;background-image: url('{{ url('/storage/attachments/video.png') }}')"
                        data-toggle="modal" data-target="#myModal">
                        <!-- The Modal -->
                        <div class="imageModal imageModalBox1">
                            <span class="imageModal-close">&times;</span>
                            <video controls id="video1">
                                <source src="{{ url(Chatify::getAttachmentUrl($attachment[0])) }}" type="video/mp4">
                                Your browser doesn't support HTML5 video tag.
                            </video>
                        </div>
                    </div>
                @else
                    <div class="post-img-wrapper">

                        <div class="unclock-overlay">
                            <div class="unlock-btn-wrapepr unlock-text text-center " style="display:none;">
                                <h6>
                                    Confirm Unlock for ${{ $attachment_price }}
                                    Once you have unlocked this media.
                                </h6>
                                <h5>
                                    <form action="{{ route('payment') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="messageid" value="{{ $id }}">
                                        <input type="hidden" name="price" value="{{ $attachment_price }}">
                                        <input type="hidden" name="to" value="{{ $from_id }}">
                                        <input type="hidden" name="type" value="Video message">
                                        <input type="submit" class="unlock-btn" data-target="#exampleModalCenter3"
                                            value="Unlock">
                                    </form>
                                </h5>
                            </div>
                            <div class="unlock-btn-wrapepr locked-text">
                                <i class="fa-solid fa-lock"></i>
                                <button class="unlock-btn unlock_feed" data="10" data-toggle="modal"
                                    data-target="#exampleModalCenter3" value="22">
                                    Video Unlock for ${{ $attachment_price }}
                                </button>
                            </div>
                        </div>
                        <img width="100%" height="153px"
                            src="{{ url('/storage/attachments/video.png') }}"alt="">
                    </div>
                @endif

            @endif

            @if (@$attachment_type == 'audio')

                @if (@abs($attachment_price) <= 0)
                    <div class="image-file audioopen"
                        style="margin-top:10px; height: 130px;background-image: url('{{ url('/storage/attachments/audio.png') }}')">
                        <!-- The Modal -->
                        <div class="imageModal imageModalBox2">
                            <span class="imageModal-close">&times;</span>
                            <audio controls class="audiochat">
                                <source src="{{ url(Chatify::getAttachmentUrl($attachment[0])) }}" type="audio/ogg">
                                <source src="{{ url(Chatify::getAttachmentUrl($attachment[0])) }}" type="audio/mpeg">
                                Your browser does not support the audio element.
                            </audio>
                        </div>
                    </div>
                @else
                    <div class="post-img-wrapper">

                        <div class="unclock-overlay">
                            <div class="unlock-btn-wrapepr unlock-text text-center " style="display:none;">
                                <h6>
                                    Confirm Unlock for ${{ $attachment_price }}
                                    Once you have unlocked this media.
                                </h6>
                                <h5>
                                    <form action="{{ route('payment') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="messageid" value="{{ $id }}">
                                        <input type="hidden" name="price" value="{{ $attachment_price }}">
                                        <input type="hidden" name="to" value="{{ $from_id }}">
                                        <input type="hidden" name="type" value="Audio message">
                                        <input type="submit" class="unlock-btn" data-target="#exampleModalCenter3"
                                            value="Unlock">
                                    </form>
                                </h5>
                            </div>
                            <div class="unlock-btn-wrapepr locked-text">
                                <i class="fa-solid fa-lock"></i>
                                <button class="unlock-btn unlock_feed" data="10">
                                    Audio Unlock for ${{ $attachment_price }}
                                </button>
                            </div>
                        </div>
                        <img width="100%" height="153px"
                            src="{{ url('/storage/attachments/audio.png') }}"alt="">
                    </div>
                @endif
            @endif
        </div>
    @endif
@endif

{{-- -------------------- Sender card (owner) -------------------- --}}
@if ($viewType == 'sender')

    <div class="message-card mc-sender" title="{{ $fullTime }}" data-id="{{ $id }}">
        <div class="chatify-d-flex chatify-align-items-center"
            style="flex-direction: row-reverse; justify-content: flex-end;">
            <i class="fas fa-trash chatify-hover-delete-btn" data-id="{{ $id }}"></i>
            <p style="margin-left: 5px;">
                {!! $message == null && $attachment != null && @$attachment[2] != 'file' ? $attachment[1] : nl2br($message) !!}
                <sub title="{{ $fullTime }}" class="message-time">
                    <span class="fas fa-{{ $seen > 0 ? 'check-double' : 'check' }} seen"></span>
                    {{ $time }}</sub>
                </sub>
                {{-- If attachment is a file --}}
                <!-- @if (@$attachment[2] == 'file')
                    <a href="{{ route(config('chatify.attachments.download_route_name'), ['fileName' => $attachment[0]]) }}"
                        class="file-download">
                        <span class="fas fa-file"></span> {{ $attachment[1] }}</a>
                @endif -->
            </p>
        </div>
        {{-- If attachment is an image --}}

        @if (@$attachment_type == 'image')
            <div class="image-file chat-image"
                style="margin-top:10px;width: 250px; height: 130px;background-image: url('{{ Chatify::getAttachmentUrl($attachment[0]) }}')">
            </div>
        @endif




        @if (@$attachment_type == 'video')
            <div class="image-file mediaopen"
                style="margin-top:10px; 
                height: 130px;background-image: url('{{ url('/storage/attachments/video.png') }}')"
                data-toggle="modal" data-target="#myModal">
                <!-- The Modal -->
                <div class="imageModal imageModalBox1">
                    <span class="imageModal-close">&times;</span>
                    <video controls id="video1">
                        <source src="{{ url(Chatify::getAttachmentUrl($attachment[0])) }}" type="video/mp4">
                        Your browser doesn't support HTML5 video tag.
                    </video>
                </div>
            </div>
        @endif

        @if (@$attachment_type == 'audio')
            <div class="image-file audioopen"
                style="margin-top:10px; height: 130px;background-image: url('{{ url('/storage/attachments/audio.png') }}')">
                <!-- The Modal -->
                <div class="imageModal imageModalBox2">
                    <span class="imageModal-close">&times;</span>
                    <audio controls class="audiochat">
                        <source src="{{ url(Chatify::getAttachmentUrl($attachment[0])) }}" type="audio/ogg">
                        <source src="{{ url(Chatify::getAttachmentUrl($attachment[0])) }}" type="audio/mpeg">
                        Your browser does not support the audio element.
                    </audio>
                </div>
            </div>
        @endif
    </div>


@endif
