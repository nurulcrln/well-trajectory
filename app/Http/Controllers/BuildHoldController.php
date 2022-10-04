<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BuildHoldController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('buildHold');
    }

    public function calcbuildhold(Request $request)
    {
        $kop = $request->input('kop');
        $target = $request->input('target');
        $n = $request->input('n');
        $e = $request->input('e');
        $bur = $request->input('bur');
        $pi = 3.1415926535898;
        $r = ((180*100)/($bur*$pi));
        $d2 = (sqrt(pow($n, $n) + pow($e, $e)));

        if ($d2 > $r) {
            $lineDC = $d2 - $r;
        } else {
            $lineDC = $r - $d2;
        }

        if ($d2 > $r) {
            $lineDO = $target - $kop;
        } else {
            $lineDO = $kop - $target;
        }

        $sudutDOC = (rad2deg(atan($lineDC/$lineDO)));
        $lineOC = ($lineDO/(cos(deg2rad($sudutDOC))));
        $sudutBOC = (rad2deg(acos($r/$lineOC)));

        if ($d2 > $r) {
            $sudutBOD = ($sudutBOC - $sudutDOC);
        } else {
            $sudutBOD = ($sudutBOC + $sudutDOC);
        }
    
        if ($d2 > $r) {
            $maximum_angle_of_well = (90 - $sudutBOD);
        } else {
            $maximum_angle_of_well = (90 + $sudutBOD);
        }
    
        if ($d2 > $r) {
            $lineBC = (sqrt(($lineOC*$lineOC)-($r*$r)));
        } else {
            $lineBC = (sqrt(($lineOC*$lineOC)+($r*$r)));
        }
    
        if ($d2 > $r) {
            $lineEC = ($lineBC*(sin(deg2rad($maximum_angle_of_well))));
        } else {
            $lineEC = ($lineBC*(sin(deg2rad($maximum_angle_of_well))));
        }

        $eob_md = ($kop+(($maximum_angle_of_well*100)/$bur));
        $eob_vd = ($kop+($r*sin(deg2rad($maximum_angle_of_well))));
        $eob_displacement = ($r*(1-cos(deg2rad($maximum_angle_of_well))));

        $target_md = ($eob_md + $lineBC);
        $target_displacement = ($lineEC + $eob_displacement);

        return view('buildHold',[
            'eob_md'=>$eob_md,
            'eob_vd'=>$eob_vd,
            'eob_displacement'=>$eob_displacement,
            'target_md'=>$target_md,
            'target_displacement'=>$target_displacement,
        ]);
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
