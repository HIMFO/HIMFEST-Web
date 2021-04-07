<div class="container">
<div class="col">
        <input wire:model.debounce.300ms="search" class="form-control member-search" type="text" placeholder="Search Member...">
    </div>
<h3 class="h3-member">Members : {{ $member->count() }}</h3>
                    <table class="table table-bordered member-table">
                        <thead>
                            <tr>
                            <th scope="col" wire:click="sortBy('id')" style="cursor: pointer;">Member ID
                            @include('partials._sort-icon',['field'=>'id'])</th>
                            <th scope="col" wire:click="sortBy('team_id')" style="cursor: pointer;">Team ID
                            @include('partials._sort-icon',['field'=>'team_id'])</th>
                            <th scope="col" wire:click="sortBy('name')" style="cursor: pointer;">Name
                            @include('partials._sort-icon',['field'=>'name'])</th>
                            <th scope="col">Email</th>
                            <th scope="col">Line ID</th>
                            <th scope="col">Phone Number</th>
                            <th scope="col">Download Student Card</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($member as $members)
                            <tr>
                            <th scope="row">{{  $members['id'] }}</th>
                            <td>{{  $members['team_id'] }}</td>
                            <td>{{  $members['name'] }}</td>
                            <td>{{  $members['email'] }}</td>
                            <td>{{  $members['lineid'] }}</td>
                            <td>{{  $members['phone'] }}</td>
                            <td>
                            <form action="{{ route('dashboard.download-file') }}" method="POST">
                            @csrf
                                <input id="teamid" type="hidden" name="teamid" value="{{  $members['id'] }}" />
                                <button type="submit" class="download_btn"><i class="fas fa-download"></i></button></a>
                                </form>
                            </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- Pagination>
                        <div class="container">
                            <p>
                                {{$member->links()}}
                            </p>
                        </div>
                        <Pagination -->
</div>