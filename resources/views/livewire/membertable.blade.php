<div class="container member-table">
                    <!-- Team Table -->
     <div class="row">
                            <div class="col-md-12">
                                <!-- DATA TABLE -->
                                <h3 class="title-5 m-b-35">Members : {{ $member->count() }}</h3>
                                <div class="table-data__tool">
                                    <div class="table-data__tool-left">
                                        <div class="rs-select2--light rs-select2--sm">
                                        <p>Filter By: </p>
                                            <select class="form-control form-control-sm" wire:model="selectedCategory">
                                                <option selected value="SMA/SMK">SMA/SMK</option>
                                                <option value="Mahasiswa">Mahasiswa</option>
                                            </select>
                                        </div>
                                            <div class="rs-select2--light rs-select2--sm">
                                            <input wire:model.debounce.300ms="search" class="form-control team-search" type="text" placeholder="Search Member..."></div>
                                    </div>
                                </div>
                                <div class="table-responsive table-responsive-data2">
                                    <table class="table table-data2">
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
                            <tr class="tr-shadow">
                            <td scope="row">{{  $members['id'] }}</td>
                            <td>{{  $members['team_id'] }}</td>
                            <td>{{  $members['name'] }}</td>
                            <td>{{  $members['email'] }}</td>
                            <td>{{  $members['lineid'] }}</td>
                            <td>{{  $members['phone'] }}</td>
                            <td><form action="{{ route('dashboard.download-file') }}" method="POST">
                            @csrf
                                <input id="teamid" type="hidden" name="teamid" value="{{  $members['id'] }}" />
                                <button type="submit" class="download_btn"><i class="fas fa-download"></i></button></a>
                                </form>
                            </td>
                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <!-- END DATA TABLE -->
                            </div>
                        </div>
                    <!-- Pagination>
                        <div class="container">
                            <p>
                                {{$member->links()}}
                            </p>
                        </div>
                        <Pagination -->
</div>