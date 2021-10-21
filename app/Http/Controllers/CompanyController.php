<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // numatytasis rikiavimas yra pagal id stulepli
        //idestoma nuo didziausio iki maziausio (ASC)

        // pagal (asc/dec- galima isrikiuoti ir kitus stulpelius)

        //1.
            //panaudojus orderBy (koks styleplis, koks rikiavima (asc/desc)- butinai gale turi buti ->get()
        //$companies=Company::orderBy('id', 'desc')->get();
            // SELECT * FROM companies
            // WHERE 1
            // ORDER BY companies.id desc

        //2.
            //pirmas- stulpelis pagal kuri rikiuojam, sort- nustatymas
            //true- mazejimo (desc)
            //false- didejimo (asc)
        //$companies=Company::all()->sortBy('id', SORT_REGULAR, true);
            // SELECT * FROM companies
            // companies paverciamos i kolekcija (objektu masyva)
            // masyvas isrikiuojamas pagal nurodoma

        //3.  jeigu norim isrikiuoti tik pagal ID- sitas variantas tinkamiausias
            //->sort (asc pagal id) ir ->sortDesc
        //$companies=Company::all()->sort();
        //$companies=Company::all()->sortDesc();


        // $companies=Company::all(); // panasu i uzklausa
        // pagal DB si komanda yra panasi i 'SELECT*FROM companies'- uzklausa


       // $_GET/$_POST=> $_REQUEST

        $collumnName=$request->collumnname; // 'pasirenkamas kuris stulpelis rikiuojamas'
        $sortby=$request->sortby;

        // !!! nustatymas, kad perkrovus puslapi liktu numatytieji nustatymai
        if (!$collumnName && !$sortby) {
            $collumnName='id';
            $sortby='asc';
        }

        //$companies=Company::orderBy( $collumName, $sortby)->get();

        // puslapiavimas
        $companies=Company::orderBy( $collumnName, $sortby)->paginate(15); //psl
        //$companies=Company::orderBy( $collumName, $sortby)->simplePaginate(15); // rodykles i kt psl
        return view('company.index', ['companies'=>$companies, 'collumnName'=>$collumnName, 'sortby'=>$sortby]);
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
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        //
    }
}
