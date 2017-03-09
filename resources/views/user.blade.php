@extends('layouts.app')

@section('content')
    <div class="row">
        <form class="col offset-s3 s6">
            <div class="input-field">
                <input id="search" type="search" required>
                <label class="label-icon" for="search"><i class="material-icons">search</i></label>
                <i class="material-icons">close</i>
            </div>
        </form>
    </div>
    
    <div class="row">
        <div class="col s3">
            <div class="row user-block">
                <div class="col s10 offset-s1">
                    <h3 class="center-align">Laurent</h3>
                    <img src="http://materializecss.com/images/yuna.jpg" class="circle center-block" alt="">
                </div>
            </div>
    
            <div class="row background-pink fake-height">
                <div class="col s10 offset-s1">
                    <h3 class="center-align">Suggestions</h3>
                </div>
            </div>
        </div>
        
        <div class="col s8 offset-s1 background-green">
            @foreach($posts as $post)
                <div class="row">
                    <div class="col s2">
                        <img src="http://materializecss.com/images/yuna.jpg" class="center-block" alt="">
                    </div>
                    <div class="col s10">
                        <p>
                            Fabio - 8 Mars à 23h35 :
                        </p>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. A ab adipisci animi consectetur dolorem eius enim est maiores nemo numquam officia pariatur, quam quis quo, quos recusandae reiciendis veniam voluptatem.
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
