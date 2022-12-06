{{-- user info and avatar --}}
<div class="avatar av-l chatify-d-flex"></div>
<p class="info-name">{{ config("chatify.name") }}</p>
<div class="messenger-infoView-btns">
  {{--
  <a href="#" class="default"><i class="fas fa-camera"></i> default</a> --}}
  <a href="#" class="danger delete-conversation"
    ><i class="fas fa-trash-alt"></i> Delete Conversation</a
  >
</div>
<ul class="nav nav-pills mb-3 ml-5" id="pills-tab" role="tablist">
  <li class="nav-item">
    <a
      class="nav-link active"
      id="pills-home-tab"
      data-toggle="pill"
      href="#pills-home"
      role="tab"
      aria-controls="pills-home"
      aria-selected="true"
      >Media</a
    >
  </li>
  @if(Auth::user()->roles->first()->title ==
  'Fan'||Auth::user()->roles->first()->title == 'fan')
  <li class="nav-item">
    <a
      class="nav-link"
      id="pills-profile-tab"
      data-toggle="pill"
      href="#pills-profile"
      role="tab"
      aria-controls="pills-profile"
      aria-selected="false"
      >Pricing</a
    >
  </li>
  @elseif(Auth::user()->roles->first()->title ==
  'Model'||Auth::user()->roles->first()->title == 'model')
  <li class="nav-item">
    <a
      class="nav-link"
      id="pills-profile-tab"
      data-toggle="pill"
      href="#Group"
      role="tab"
      aria-controls="Group"
      aria-selected="false"
      >Groups</a
    >
  </li>
  @endif
</ul>

<div class="tab-content" id="pills-tabContent">
  <div
    class="tab-pane fade show active"
    id="pills-home"
    role="tabpanel"
    aria-labelledby="pills-home-tab"
  >
    <div class="messenger-infoView-shared">
      <p class="messenger-title">shared photos</p>
      <div class="shared-photos-list"></div>
    </div>
  </div>
  <div
    class="tab-pane fade"
    id="Group"
    role="tabpanel"
    aria-labelledby="pills-home-tab"
  ></div>
  <div
    class="tab-pane fade"
    id="pills-profile"
    role="tabpanel"
    aria-labelledby="pills-profile-tab"
  >
    <div class="model-pricing-list">
      <div class="row mb-3">
        <div class="col-12 mt-3">
          <img src="{{ url('/assets/icons/text-mgs.png') }}" alt="" /><br />
          <span class="pt-4 text-muted msg-sent-info"></span>
        </div>
        <div class="col-12 mt-3">
          <img src="{{ url('/assets/icons/video-mgs.png') }}" alt="" /><br />
          <span class="pt-4 text-muted video-sent-info"></span>
        </div>
        <div class="col-12 mt-3">
          <img src="{{ url('/assets/icons/pic-mgs.png') }}" alt="" /><br />
          <span class="pt-4 text-muted image-sent-info"></span>
        </div>
        <div class="col-12 mt-3">
          <img src="{{ url('/assets/icons/microphone-2.png') }}" alt="" /><br />
          <span class="pt-4 text-muted audio-sent-info"></span>
        </div>
        <div class="col-12 mt-3">
          <img src="{{ url('/assets/icons/phone-call.png') }}" alt="" /><br />
          <span class="pt-4 text-muted audio-call-info"></span>
        </div>
        <div class="col-12 mt-3">
          <img src="{{ url('/assets/icons/video-call.png') }}" alt="" /><br />
          <span class="pt-4 text-muted video-call-info"></span>
        </div>
      </div>
    </div>
  </div>
</div>
{{-- shared photos --}}
