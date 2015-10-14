<div class="row">
    <div class="col-md-12">
        <legend><span class="badge">{{ isset($model) ? count($model->pictures) : '' }}</span> Pictures</legend>
    </div>
</div>

<div class="pictures-list">
    @if (isset($model))

        <?php $last_ndx = count($model->pictures)-1; ?>
        @foreach($model->pictures as $ndx => $picture)

            @if($ndx === 0)
                <div class="row picture-row">
            @endif

            @if($ndx%4 === 0 && $ndx > 0)
                <div class="row picture-row">
            @endif

            <div class="col-sm-3">
                <a href='{{ URL::to("/uploads/venues/$model->id/$picture->filename") }}' class="mthumbs" data-caption='{{ $picture->filename }}'>
                    {{ HTML::image("uploads/venues/$model->id/$picture->filename", $picture->filename, array('class' => 'minithumb')) }}
                </a>
                <button type="button" data-action="{{ URL::to('pictures/' . $picture->id . '/delete' ) }}" class="modal-popup btn btn-xs btn-delete fa fa-trash"></button>
            </div>

            @if($ndx === $last_ndx || (($ndx+1)%4 === 0))
                </div>
            @endif

        @endforeach

    @endif
</div>

<div class="contentz">
    <form action="{{ URL::to('/venues/'.$model->id.'/upload') }}" method="post" enctype="multipart/form-data" class="dropzone" id="venues_image_upload">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
    </form>
</div>
