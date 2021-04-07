<div class="container">
    <div class="col">
        <input wire:model.debounce.300ms="search" class="form-control team-search" type="text" placeholder="Search Team...">
    </div>
    
    <!-- Team Table -->
    <h3 class="h3-team">Teams : {{ $team->count() }}</h3>
                    <table class="table table-bordered team-table">
                        <thead>
                            <tr>
                            <th scope="col" wire:click="sortBy('id')" style="cursor: pointer;">Team ID 
                            @include('partials._sort-icon',['field'=>'id'])</th>
                            <th scope="col" wire:click="sortBy('name')" style="cursor: pointer;">Team Name
                            @include('partials._sort-icon',['field'=>'name'])</th>
                            <th scope="col">Leader ID</th>
                            <th scope="col" wire:click="sortBy('category')" style="cursor: pointer;">Category
                            @include('partials._sort-icon',['field'=>'category'])</th>
                            <th scope="col" wire:click="sortBy('referrer')" style="cursor: pointer;">Referrer
                            @include('partials._sort-icon',['field'=>'referrer'])</th>
                            <th scope="col" wire:click="sortBy('payment_proof_file_path')" style="cursor: pointer;">Status Pembayaran
                            @include('partials._sort-icon',['field'=>'payment_proof_file_path'])</th>
                            <th scope="col" >Download Answer</th>
                            <th scope="col">Download Bukti Bayar</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($team as $teams)
                            <tr>
                            <th scope="row">{{  $teams['id'] }}</th>
                            <td>{{  $teams['name'] }}</td>
                            <td>{{  $teams['leader_id'] }}</td>
                            <td>{{  $teams['category'] }}</td>
                            <td>{{  $teams['referrer'] }}</td>
                            <td><?php $check = $teams['payment_proof_file_path'];
                            if($check == NULL){
                                echo "Belum bayar";
                            }else{
                                echo "Sudah bayar";
                            }?></td>
                            <td>
                            <form action="{{ route('dashboard.download-file') }}" method="POST">
                            @csrf
                                <input id="teamid" type="hidden" name="teamid" value="{{  $teams['id'] }}" />
                                <input id="type" type="hidden" name="type" value="submission" />
                                <button type="submit" class="download_btn"><i class="fas fa-download"></i></button></a>
                                </form>
                            </td>
                            <td>
                            <form action="{{ route('dashboard.download-file') }}" method="POST">
                            @csrf
                                <input id="teamid" type="hidden" name="teamid" value="{{  $teams['id'] }}" />
                                <input id="type" type="hidden" name="type" value="payment_proof" />
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
                                {{$team->links()}}
                            </p>
                        </div>
                        <Pagination -->
    
    <!-- End of Team Table -->
</div>
