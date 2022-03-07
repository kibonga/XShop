{{-- Contact info--}}
<div class="col-md-4 pt-5">
    <h2 class="h2 text-success border-bottom pb-3 border-light logo">Zay Shop</h2>
    <ul class="list-unstyled text-light footer-link-list">
        @foreach($contactInfo as $contact)
            <li>
                <i class="fas {{$contact['icon']}} fa-fw"></i>
                {{$contact['value']}}
            </li>
        @endforeach
    </ul>
</div>
{{-- Contact info--}}
