<?php

namespace App\Http\Controllers;

use App\CustomerGroup;
use App\Utils\Util;
use Illuminate\Http\Request;
use DB;
use Yajra\DataTables\Facades\DataTables;

class CustomerGroupController extends Controller
{
    /**
       * Constructor
       *
       * @param Util $commonUtil
       * @return void
       */
    public function __construct(Util $commonUtil)
    {
        $this->commonUtil = $commonUtil;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!auth()->user()->can('customer.view')) {
            abort(403, 'Unauthorized action.');
        }

        if (request()->ajax()) {
            $business_id = request()->session()->get('user.business_id');

            $customer_group = CustomerGroup::where('business_id', $business_id)
                                ->select(['name','subscription_cost','subscription_pieces','id','expire_in']);

            return Datatables::of($customer_group)
                    ->addColumn(
                        'action',
                        '@can("customer.update")
                            <button data-href="{{action(\'CustomerGroupController@edit\', [$id])}}" class="btn btn-xs btn-primary edit_customer_group_button"><i class="glyphicon glyphicon-edit"></i> @lang("messages.edit")</button>
                        &nbsp;
                        @endcan

                        @can("customer.delete")
                            <button {{ $id == 1 ? "disabled" : "" }} data-href="{{action(\'CustomerGroupController@destroy\', [$id])}}" class="btn btn-xs btn-danger delete_customer_group_button"><i class="glyphicon glyphicon-trash"></i> @lang("messages.delete")</button>
                        @endcan'
                    )
                    ->removeColumn('id')
                    ->rawColumns([4])
                    ->make(false);
        }

        return view('customer_group.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!auth()->user()->can('customer.create')) {
            abort(403, 'Unauthorized action.');
        }

        return view('customer_group.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!auth()->user()->can('customer.create')) {
            abort(403, 'Unauthorized action.');
        }

        try {
            $input = $request->only(['name', 'amount','expire_in']);
            $input['business_id'] = $request->session()->get('user.business_id');
            $input['created_by'] = $request->session()->get('user.id');
            $subscription_cost = !empty($request['subscription_amout']) ? $this->commonUtil->num_uf($request['subscription_amout']) : 0;
            $subscription_pieces = !empty($request['subscription_pieces']) ? $this->commonUtil->num_uf($request['subscription_pieces']) : 0;
            $input['amount'] = !empty($input['amount']) ? $this->commonUtil->num_uf($input['amount']) : 0;
            $customer_group = CustomerGroup::create($input);
            $upCusGrp = CustomerGroup::where('id', $customer_group->id)
                ->update(
                    [
                        'subscription_cost' => $subscription_cost,
                        'subscription_pieces' => $subscription_pieces,
                    ]
                );
            $output = ['success' => true,
                            'data' => $customer_group,
                            'msg' => __("lang_v1.success")
                        ];
        } catch (\Exception $e) {
            \Log::emergency("File:" . $e->getFile(). "Line:" . $e->getLine(). "Message:" . $e->getMessage());
            $output = ['success' => false,
                            'msg' => __("messages.something_went_wrong")
                        ];
        }

        return $output;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CustomerGroup  $customerGroup
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!auth()->user()->can('customer.update')) {
            abort(403, 'Unauthorized action.');
        }

        if (request()->ajax()) {
            $business_id = request()->session()->get('user.business_id');
            $customer_group = CustomerGroup::where('business_id', $business_id)->find($id);

            return view('customer_group.edit')
                ->with(compact('customer_group'));
        }
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
        if (!auth()->user()->can('customer.update')) {
            abort(403, 'Unauthorized action.');
        }

        if (request()->ajax()) {
            try {
                $input = $request->only(['name', 'amount','expire_in']);
                $business_id = $request->session()->get('user.business_id');

                $input['amount'] = !empty($input['amount']) ? $this->commonUtil->num_uf($input['amount']) : 0;

                $subscription_cost = !empty($request['subscription_amout']) ? $this->commonUtil->num_uf($request['subscription_amout']) : 0;
                $subscription_pieces = !empty($request['subscription_pieces']) ? $this->commonUtil->num_uf($request['subscription_pieces']) : 0;
                $customer_group = CustomerGroup::where('business_id', $business_id)->findOrFail($id);
                $customer_group->name = $input['name'];
                $customer_group->amount = $input['amount'];
                $customer_group->expire_in = $input['expire_in'];
                $customer_group->subscription_cost = $request['subscription_amout'];
                $customer_group->subscription_pieces = $request['subscription_pieces'];
                $customer_group->save();

                $output = ['success' => true,
                            'msg' => __("lang_v1.success")
                            ];
            } catch (\Exception $e) {
                \Log::emergency("File:" . $e->getFile(). "Line:" . $e->getLine(). "Message:" . $e->getMessage());
            
                $output = ['success' => false,
                            'msg' => __("messages.something_went_wrong")
                        ];
            }

            return $output;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!auth()->user()->can('customer.delete')) {
            abort(403, 'Unauthorized action.');
        }

        if (request()->ajax()) {
            try {
                $business_id = request()->user()->business_id;

                $cg = CustomerGroup::where('business_id', $business_id)->findOrFail($id);
                $cg->delete();

                $output = ['success' => true,
                            'msg' => __("lang_v1.success")
                            ];
            } catch (\Exception $e) {
                \Log::emergency("File:" . $e->getFile(). "Line:" . $e->getLine(). "Message:" . $e->getMessage());
            
                $output = ['success' => false,
                            'msg' => __("messages.something_went_wrong")
                        ];
            }

            return $output;
        }
    }

    public function customerSubscriptions(Request $request){
        try {
            $customer_subscriptions = DB::table('customer_subscriptions')
            ->where('customer_subscriptions.customer_id',$request['id'])
            ->join('customer_groups','customer_groups.id','=','customer_subscriptions.group_id')
            ->select(['customer_subscriptions.*','customer_groups.name','subscription_cost','subscription_pieces','expire_in'])
            ->get();
            return view('contact.subscriptions',['customer_subscriptions'=>$customer_subscriptions]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
    public function customerExpringSubscriptions(Request $request){
        try {
            $customer_subscriptions = DB::table('customer_subscriptions')
            ->join('customer_groups','customer_groups.id','=','customer_subscriptions.group_id')
            ->join('contacts','contacts.id','=','customer_subscriptions.customer_id')
            ->select(['customer_subscriptions.*','customer_groups.name','expire_in','subscription_cost','contacts.name as cust','contacts.mobile'])
            ->get();
            return view('contact.expnear',['customer_subscriptions'=>$customer_subscriptions]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
    


    public function assignToGroup(){
        $business_id = request()->session()->get('user.business_id');
        $customer_groups = CustomerGroup::select(['name','id'])->get();
        return view('customer_group.assign',['customer_groups'=>$customer_groups]);
    }
    public function editCustSub($id){
        $business_id = request()->session()->get('user.business_id');
        return view('contact.editsubs',['id'=>$id]);
    }


    public function assignCustomerToGroup(Request $request){
        try {
            $csgi = CustomerGroup::where('id',$request['group'])->first();
            DB::table('customer_subscriptions')->insert([
                'customer_id'=>$request['id'],
                'group_id'=>$request['group'],
                'total'=>$csgi->subscription_pieces,
                'used'=>0,
                'available'=>$csgi->subscription_pieces,
                'payment_status'=> $request['payment_status'],
                'renewed_on'=> date('Y-m-d'),
                'amount_paid'=>$request['amount_paid'],
                'expired'=>0,
            ]);
            return redirect()->back();
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
    public function updateCustomerGroup(Request $request){
        try {
            $cs = DB::table('customer_subscriptions')->where('id',$request['id'])->first();
            $cg = CustomerGroup::where('id',$cs->group_id)->first();
           
            DB::table('customer_subscriptions')
            ->where('id',$request['id'])
            ->update([
                'payment_status'=> $request['payment_status'],
                'amount_paid'=>$request['amount_paid'] + $cs->amount_paid,
                'expired'=>$request['expired_status'],
                'renewed_on'=>$request['renewed_on'] !== NULL ? $request['renewed_on'] : $cs->renewed_on,
                'available'=>$request['renewed_on'] !== NULL ? ($cg->subscription_pieces + $cs->available) : $cs->available,
            ]);
            return redirect()->back();
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
