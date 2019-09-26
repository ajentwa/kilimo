<ul class="list-group">
    <li class="list-group-item"><strong>First Name:</strong> {{ $crop->farmer->first_name }}</li>
    <li class="list-group-item"><strong>Middle Name:</strong> {{ $crop->farmer->middle_name }}</li>
    <li class="list-group-item"><strong>Surname:</strong> {{ $crop->farmer->surname }}</li>
    <li class="list-group-item"><strong>Email Address:</strong> {{ $crop->farmer->email }}</li>
    <li class="list-group-item"><strong>Phone Number:</strong> {{ $crop->farmer->phone_no }}</li>
    <li class="list-group-item"><strong>Ward:</strong> {{ $crop->farmer->ward->name }}</li>
</ul>
