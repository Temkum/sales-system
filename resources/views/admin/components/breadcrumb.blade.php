<h4 class="fw-bold py-3 mb-4">
    <span class="text-muted fw-light"> <a href="{{ route('admin.dashboard') }}">Dashboard </a>/</span>

    <?php $link = ''; ?>

    @for ($i = 1; $i <= count(Request::segments()); $i++)
        @if (($i < count(Request::segments())) & ($i > 0))
            <?php $link .= '/' . Request::segment($i); ?>
            <span href="<?= $link ?>">
                {{ ucwords(str_replace('-', ' ', Request::segment($i))) }}
            </span>
        @else
            {{ ucwords(str_replace('-', ' ', Request::segment($i))) }}
        @endif
    @endfor
</h4>
