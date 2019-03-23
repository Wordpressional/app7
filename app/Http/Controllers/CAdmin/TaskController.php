<?php
namespace App\Http\Controllers\CAdmin;
use Session;
use App\Task;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller {
    public function __construct() {

        $this->middleware('auth');
    }
    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function index() {

        //return "index";

        $tasks = Task::where(['user_id' => Auth::user()->id])->get();

        return response()->json([

            'tasks' => $tasks,

        ], 200);

    }

    /**

     * Show the form for creating a new resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function create()

    {

        //
        return "create";
    }

    /**

     * Store a newly created resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @return \Illuminate\Http\Response

     */

    public function store(Request $request) {
        //return "store";
        $task = new Task();
        $task->name = $request->name;
        $task->description = $request->description;
        $task->user_id = Auth::user()->id;
        $task->save();

        return response()->json([
            'task' => $task,
            'message' => 'Success'
        ], 200);
    }

    /**

    * Display the specified resource.

    *

    * @param  \App\Task  $task

    * @return \Illuminate\Http\Response

    */

    public function show(Task $task)

    {

        //
        return "show";

    }

    /**

     * Show the form for editing the specified resource.

     *

     * @param  \App\Task  $task

     * @return \Illuminate\Http\Response

     */

    public function edit(Task $task)

    {

        //
        return "edit";

    }

    /**

     * Update the specified resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @param  \App\Task  $task

     * @return \Illuminate\Http\Response

     */

    public function update(Request $request, $id) {
        //return "update";
        $this->validate($request, [
            'name' => 'required|max:255',
            'description' => 'required',
        ]);
        //dd($id);
        $task = Task::where('id',$id)->first();
        //dd($task);
        $task->name = $request->name;
        $task->description = $request->description;
        $task->user_id = Auth::user()->id;
        $task->save();
        return response()->json([
            'message' => 'Task updated successfully!'
        ], 200);
    }

    /**

    * Remove the specified resource from storage.

    *

    * @param  \App\Task  $task

    * @return \Illuminate\Http\Response

    */

    public function destroy($id)

    {
        //return "destroy";
        $task = Task::where('id',$id)->first();
        //dd($task);
        $task->delete();
        return response()->json([
            'message' => 'Task deleted successfully!'
        ], 200);
    }
}