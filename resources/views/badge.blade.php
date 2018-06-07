<div class="col-md-3">
    <div class="bg-mute">
        <div class="row vertical-align">
             @if (isset($icon))
            <div class="col-xs-3">
                <i class="fa fa-{{ $icon }} fa-3x"></i>
            </div>
            <div class="col-xs-9 text-right">
                <h4 class="font-bold">{{ $text }}</h4>
            </div>
                 @else
                <div class="col-xs-12 text-center">
                    <h4 class="font-bold">{{ $text }}</h4>
                </div>
            @endif
        </div>
    </div>
</div>