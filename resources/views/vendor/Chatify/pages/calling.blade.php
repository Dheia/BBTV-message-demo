<link rel="canonical" href="https://quickblox.github.io/quickblox-javascript-sdk/samples/webrtc"/>
<link rel="shortcut icon" href="https://quickblox.com/favicon.ico">

<link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.min.css">
<!-- use http://una.im/CSSgram/ for filters -->
<link rel="stylesheet" href="https://cdn.rawgit.com/una/CSSgram/master/source/css/cssgram.css">
<!-- app styles -->
<link rel="stylesheet" href="{{ url('videojs/styles.css') }}"> 

<div class="wrapper j-wrapper">
    <main class="app" id="app">
        <div class="page">
            <!-- JOIN -->
            <div class="dashboard j-dashboard">
            </div>
        </div>
    </main>
</div>

<!-- MODALS -->

<div class="modal fade" id="join_err" tabindex="-1" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>

                <h4>Connect is failed</h4>
            </div>

            <div class="modal-body">

                <p class="text-danger error">

                </p>

                <p class="text-danger">
                    Something wrong with connect. Check internet connection or server credentials and trying again.
                </p>
            </div>
            <p></p>
        </div>
    </div>
</div>


<div class="modal fade" id="connect_err" tabindex="-1" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>

                <h4>Connect to chat is failed</h4>
            </div>

            <div class="modal-body">
                <p class="text-danger">
                    Something wrong with connect to chat. Check internet connection or user info and trying again.
                </p>
            </div>
            <p></p>
        </div>
    </div>
</div>

<div class="modal fade" id="already_auth" tabindex="-1">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Warning</h4>
            </div>

            <div class="modal-body">
                <p class="text-danger">User has already authorized.</p>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="error_no_calles" tabindex="-1">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Error</h4>
            </div>

            <div class="modal-body">
                <p class="text-danger">Please choose users to call</p>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="income_call" tabindex="-1" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Call from <strong class="j-ic_initiator"></strong></h3>
            </div>

            <div class="modal-footer" style="margin: auto; border-top: none;">
                <button type="button" class="btn btn-danger j-decline">Decline</button>
                <button type="button" class="btn btn-success j-accept">Accept</button>
            </div>
        </div>
    </div>
</div>

 