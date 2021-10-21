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

    // SUSIKURIAMA PAIESKA- FUNKCIJAi/ PAIESKAI

    public function search(Request $request) {

        //$companies=Company::paginate(15);

        // filtravimas pagal type_id
        //1.
            // pasirenkama viskas is companies lenteles, kur type_id yra lygus 6
            // $companies= Company::where('type_id', 6)->get();
            // SELECT * FROM companies
            // WHERE  type_id=6

        // 2.
            // pasiimama visa kolekcija ir tada ji yra filtruojama
            // $companies= Company::all()->where('type_id','>', 6); tokiu atveju isfiltruojama didesni nei 6
            // $companies= Company::all()->where('type_id', 6); // tik su 6

            // jeigu pagar du parametrus- du where->
            //$companies= Company::all()->where('type_id', '>=', 16)->where("type_id",'<=', 150);

            // where type_id=151 OR type_id=152
            //$companies= Company::all()->firstWhere('type_id', 151)->orWhere("type_id",152)->get();
            // $companies= Company::all()->where('type_id', 151)->orWhere("type_id",152)->get();

            // ieskoma rezultatu kur pavadinime yra raides han


            $search=$request->search;
            $companies= Company::query()->sortable()->where('title', 'LIKE', "%{$search}%")->orWhere('description', 'LIKE', "%{$search}%")->paginate(5);

        return view ('company.search', ['companies'=>$companies]);
    }
}
