<a href="{{ url('view',$course->id) }}" class="text-decoration-none text-muted">
    <div class="course position-relative rounded-3 bg-white">
        <div class="aspect-img"
            style="background: url('{{ URL::to('storage/app').'/'.$course->image }}');">
        </div>
        <div class="card-body">
            <h5 class="card-title text-dark">{{ $course->title }}</h5>
            <span class="text-primary">{{ $course->instructor }}</span><br>
            <div class="card-text">Lorem ipsum dolor sit, amet consectetur adipisicing elit.</div>
            <div class="mt-1">
                @if ($course->price)
                <span class="me-1">{{ $global_settings->currency_symbol }} </span>
                <span class="text-primary">{{ ($course->discounted_price) ? $course->discounted_price : $course->price }}</span>
                <span class="ms-1"><del>{{ ($course->discounted_price) ? $course->price : '' }}</del></span>
                @else
                <span class="text-primary">Free</span>
                @endif
            </div>
            @if ($course->featured == 1)
                <div class="btn-sm btn-success featured-btn position-absolute">Featured</div>
            @endif
        </div>
    </div>
</a>