@extends('layouts.app')

@section('content')
    @foreach($favoriters as $favoriter)
    <div class="row">
        <div class="col-xs-8">
            <?php echo $favoriter; ?>
        </div>
    </div>
    @endforeach
@endsection