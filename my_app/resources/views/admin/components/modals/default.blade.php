@php
    $title = $title ?? 'Default Model';
    $content = $content ?? '<p>One fine body&hellip;</p>';
    $close = $close ?? __('Close');
    $agree = $agree ?? __('Accept');
@endphp

<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">{{ $title }}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {!! $content !!}
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default btn-close" data-dismiss="modal">{{ $close }}</button>
                <button type="button" class="btn btn-warning btn-agree">{{ $agree }}</button>
            </div>
        </div>

    </div>

</div>
