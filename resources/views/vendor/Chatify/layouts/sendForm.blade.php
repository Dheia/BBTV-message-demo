<div class="messenger-sendCard">
    <form id="message-form" method="POST" action="{{ route('send.message') }}" enctype="multipart/form-data">
        @csrf
      
        {{-- 
        @if (Auth::user()->wallet <= '0')
            <h2>Insufficent credits</h2>
        @else --}}
        <label><span class="fas fa-paperclip"></span>
            <input disabled='disabled' type="file" class="upload-attachment" name="file"
                accept=".{{ implode(', .', config('chatify.attachments.allowed_images')) }}, .{{ implode(', .', config('chatify.attachments.allowed_files')) }}" />
            <input type="hidden" class="input-price" name="price" id="premium_cost1" value="0.00" />
        </label>
        <textarea readonly='readonly' maxlength="100" name="message" class="m-send app-scroll sendMessage" placeholder="Type a message.."></textarea>
        <button disabled='disabled'><span class="fas fa-paper-plane"></span></button>
        {{-- @endif --}}
    </form>
</div>
