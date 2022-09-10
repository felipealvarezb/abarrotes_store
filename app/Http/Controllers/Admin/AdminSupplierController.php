<?php

namespace App\Http\Controllers\Admin;

use App\Models\Supplier;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminSupplierController extends Controller
{

    /*
    * Este método crea un arreglo, donde se almacena un titulo y todos los suppliers
    * que estan en la base de datos para ser pasados a la vista del admin/supplier
    * para poderlos mostrarlos en la vista.
    */

    public function index()
    {
        $viewData = [];
        $viewData["title"] = "Admin Page - Suppliers - Online Store";
        $viewData["suppliers"] = Supplier::all();
        return view("admin.supplier.index")->with("viewData", $viewData);
    }

    /*
    * Este método recibe un id de un supplier como parametro, y lo que va a hacer
    * es buscarlo en la base de datos por el id y traelo para guardarlo en el arreglo que va a ser enviado
    * a la vista, para poder mostrar el supplier junto con toda su información
    */

    public function show($id)
    {
        $viewData = [];
        $supplier = Supplier::findOrFail($id);

        $viewData["title"] = $supplier->getName()." - Online Store";
        $viewData["subtitle"] = $supplier->getName()." - supplier information";
        $viewData["supplier"] = $supplier;
        return view("admin.supplier.show")->with("viewData", $viewData);
    }

    /*
    * Este método recibe un objeto request por parametro y lo que hace es hacer las validaciones
    * de los atributos del objeto supplier que creamos, luego crea un objeto supplier con
    * los valores ingresados por el formulario html que tenemos en la vista, si se crea
    * con exito se envia un mensaje de exito y se guarda en la base de datos, sino se muestra el error.
    */

    public function create(Request $request)
    {
        
        Supplier::validate($request);
        
        $newSupplier = new Supplier();
        $newSupplier->setName($request->input("name"));
        $newSupplier->setNit($request->input("nit"));
        $newSupplier->setPhone($request->input("phone"));
        $newSupplier->setEmail($request->input("email"));
        $newSupplier->setObservation($request->input("observation"));
        $newSupplier->save();

        return back()->with("success", "Data inserted Successfully");
    }

    /*
    * Este método recibe un id por parametro y lo que hace es invocar el metodo destroy del objeto
    * que toma su primary key que es el id como parametro y lo elimina de la base de datos
    */

    public function delete($id)
    {

        Supplier::destroy($id);
        return back();
    }

    /*
    * Este método busca un supplier en la base de datos por su id que se pasó como parametro
    * y lo envía a la vista admin.supplier.edit indicando que ese es el supplier que van a
    * editar o modificar
    */

    public function edit($id)
    {

        $viewData = [];
        $viewData["title"] = "Admin Page - Edit Supplier - Online Store";
        $viewData["supplier"] = Supplier::findOrFail($id);
        
        return view("admin.supplier.edit")->with("viewData", $viewData);
    }

    /*
    * Este método recibe un objeto request y un id como parametro, busca un supplier por su id
    * y le asigna los nuevos atributos ingresados por el formulario. Luego se asigna una nueva
    * imagen si fue ingresada y finalmente se guardan los cambios en la base de datos.
    */

    public function update(Request $request, $id)
    {
        
        Supplier::validate($request);

        $supplier = Supplier::findOrFail($id);

        $supplier->setName($request->input("name"));
        $supplier->setNit($request->input("nit"));
        $supplier->setPhone($request->input("phone"));
        $supplier->setEmail($request->input("email"));
        $supplier->setObservation($request->input("observation"));
        $supplier->save();

        return redirect()->route("admin.supplier.index");
    }
}
