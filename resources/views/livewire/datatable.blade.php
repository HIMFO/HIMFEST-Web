<div class="container team-table">

    <!-- Team Table -->
     <div class="row">
                            <div class="col-md-12">
                                <!-- DATA TABLE -->
                                <h3 class="title-5 m-b-35">Teams : {{ $team->count() }}</h3>
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
                                        </div>
                                            <div class="rs-select2--light rs-select2--sm">
                                            <input wire:model.debounce.300ms="search" class="form-control team-search" type="text" placeholder="Search Team..."></div>
                                    </div>
                                </div>
                                <div class="table-responsive table-responsive-data2">
                                    <table class="table table-data2">
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
                                            <tr class="tr-shadow">
                                                <td scope="row">{{  $teams['id'] }}</td>
                                                <td>{{  $teams['name'] }}</td>
                                                <td>{{  $teams['leader_id'] }}</td>
                                                <td>{{  $teams['category'] }}</td>
                                                <td>{{  $teams['referrer'] }}</td>
                                                <td><?php $check = $teams['payment_proof_file_path'];
                            if($check == NULL){
                                echo "<span class='status--denied'>". "Belum bayar" . "</span>";
                            }else{
                                echo "<span class='status--process'>". "Belum bayar" . "</span>";
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
                                </div>
                                <!-- END DATA TABLE -->
                            </div>
                        </div>
                        <!-- Pagination>
                        <div class="container">
                            <p>
                                {{$team->links()}}
                            </p>
                        </div>
                        <Pagination -->
    
    <!-- End of Team Table -->
</div>
</body>
</html>