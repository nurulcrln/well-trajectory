@extends('layout/main')

@section('title', 'Well Trajectory - Build Hold')

@section('container')
<div class="container"><br>
    <h3> Build Hold </h3><br>
    <div class="row">
        <div class="col-sm-4">
            <div class="inputArea">
                <form method="POST" action="/calcbuildhold">
                @csrf
                <label for="kop">Kick Of Point (V1):</label><br />
                <input type="number" step="any" id="kop" name="kop" onkeypress="nextfield('target')" /> ft<br />
                <label for="target">Target (V3):</label><br />
                <input type="number" step="any" id="target" name="target" onkeypress="nextfield('n')" /> ft<br />
                <label for="n">Northing:</label><br />
                <input type="number" step="any" id="n" name="n" onkeypress="nextfield('e')" /> ft<br />
                <label for="e">Easting:</label><br />
                <input type="number" step="any" id="e" name="e" onkeypress="nextfield('bur')"/> ft<br />
                <label for="bur">Build Up Rate (BUR):</label><br />
                <input type="number" step="any" id="bur" name="bur" onkeypress="nextfield('calculate')"/> deg/100ft<br /><br />
                <button type="submit" class="btn btn-light" id="calculate"> Calculate </button>
                </form>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="grafikArea">
                <canvas id="myChart" style="width:100%;max-width:700px"></canvas>
            </div>
        </div>
    </div>
    <div class="output-area">
        <div class="endOfBuild">
            <br />
            End Of Build (EOB)
            <table class="table table-striped" id="eob">
            <tr>
                <th>MD</th>
                <th>VD</th>
                <th>Displacement</th>
            </tr>
            <tr>
                <td>{{$eob_md}}</td>
                <td>{{$eob_vd}}</td>
                <td>{{$eob_displacement}}</td>
            </tr>
            </table>
            <br />

            Target
            <table class="table table-striped" id="targettable">
            <tr>
                <th>MD</th>
                <th>Displacement</th>
            </tr>
            <tr>
                <td>{{$target_md}}</td>
                <td>{{$target_displacement}}</td>
            </tr>
            </table>
        </div>

        <div class="tabelKedalaman">
            <br />
            Tabel Kedalaman
            <table class="table table-striped" id="kedalaman" width="500px">
            <tr>
                <th>MD (ft) </th>
                <th>Inclination (deg)</th>
                <th>TVD (ft) </th>
                <th>Total Departure (ft)</th>
                <th>Status</th>
            </tr>
            <tr>
                <td>0</td>
                <td></td>
                <td>0</td>
                <td>0</td>
                <td>Vertical</td>
            </tr>
            </table>
        </div>
    </div>
</div>
@endsection