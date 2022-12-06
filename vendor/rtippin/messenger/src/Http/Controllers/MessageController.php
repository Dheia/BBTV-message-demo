<?php

namespace RTippin\Messenger\Http\Controllers;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\JsonResponse;
use RTippin\Messenger\Actions\Messages\ArchiveMessage;
use RTippin\Messenger\Actions\Messages\EditMessage;
use RTippin\Messenger\Actions\Messages\RemoveEmbeds;
use RTippin\Messenger\Actions\Messages\StoreMessage;
use RTippin\Messenger\Http\Collections\MessageCollection;
use RTippin\Messenger\Http\Collections\MessageEditCollection;
use RTippin\Messenger\Http\Request\EditMessageRequest;
use RTippin\Messenger\Http\Request\MessageRequest;
use RTippin\Messenger\Http\Resources\MessageResource;
use RTippin\Messenger\Models\Message;
use RTippin\Messenger\Models\Thread;
use RTippin\Messenger\Repositories\MessageRepository;
use Throwable;
use App\Models\ModelFeed;
use App\Models\User;
use App\Models\Setting;
use App\Models\User_logs;
use Auth;
class MessageController
{
    use AuthorizesRequests;
    /**
     * Display a listing of the most recent messages.
     *
     * @param  MessageRepository  $repository
     * @param  Thread  $thread
     * @return MessageCollection
     *
     * @throws AuthorizationException
     */
    public function index(MessageRepository $repository, Thread $thread): MessageCollection
    {
        $this->authorize('viewAny', [
            Message::class,
            $thread,
        ]);
        return new MessageCollection(
            $repository->getThreadMessagesIndex($thread),
            $thread->load('participants.owner')
        );
    }
    /**
     * Display message history pagination.
     *
     * @param  MessageRepository  $repository
     * @param  Thread  $thread
     * @param  Message  $message
     * @return MessageCollection
     *
     * @throws AuthorizationException
     */
    public function paginate(MessageRepository $repository,
                             Thread $thread,
                             Message $message): MessageCollection
    {
        $this->authorize('view', [
            $message,
            $thread,
        ]);

        return new MessageCollection(
            $repository->getThreadMessagesPage($thread, $message),
            $thread,
            true,
            $message->id
        );
    }

    /**
     * Store a new message.
     *
     * @param  MessageRequest  $request
     * @param  StoreMessage  $storeMessage
     * @param  Thread  $thread
     * @return MessageResource
     *
     * @throws AuthorizationException|Throwable
     */
    public function store(MessageRequest $request, StoreMessage $storeMessage, Thread $thread ): MessageResource
    {
       
        $this->authorize('create', [
            Message::class,
            $thread,
        ]);
        if (Auth::user()->roles->first()->title == 'Fan') {
        $Get_fanid = Auth::user()->id;
        $Get_feed='10';

     if (Auth::user()->wallet>=$Get_feed) {
            $commission = Setting::pluck("value", "name");
            $admin_comi=($Get_feed*$commission['commission'])/100;
            $model_comi=$Get_feed-$admin_comi;
            $fan_charge=User::where('id',Auth::user()->id)->first();
            $fan_charge->wallet=$fan_charge->wallet-$Get_feed;
            $fan_charge->save();
            $model_earning=User::where('id','181')->first();
            $model_earning->wallet=$model_earning->wallet + $model_comi;
            $model_earning->save();
            $User_logs= new User_logs;
            $User_logs->method='message';
            $User_logs->from=Auth::user()->id;
            $User_logs->to='181';
            $User_logs->price=$Get_feed;
            $User_logs->model_earning=$model_comi;
            $User_logs->earnings	=$admin_comi;
            $User_logs->save();        
           
        }
        return $storeMessage->execute(
            $thread,
            $request->validated(),
            $request->ip()
        )->getJsonResource();
    }
        return $storeMessage->execute(
            $thread,
            $request->validated(),
            $request->ip()
        )->getJsonResource();
    }

    /**
     * Display the message.
     *
     * @param  Thread  $thread
     * @param  Message  $message
     * @return MessageResource
     *
     * @throws AuthorizationException
     */
    public function show(Thread $thread, Message $message): MessageResource
    {
        $this->authorize('view', [
            $message,
            $thread,
        ]);

        return new MessageResource($message, $thread, true);
    }

    /**
     * Display the message edits.
     *
     * @param  Thread  $thread
     * @param  Message  $message
     * @return MessageEditCollection
     *
     * @throws AuthorizationException
     */
    public function showEdits(Thread $thread, Message $message): MessageEditCollection
    {
        $this->authorize('viewEdits', [
            $message,
            $thread,
        ]);

        return new MessageEditCollection($message->edits()->get());
    }

    /**
     * Update the message body.
     *
     * @param  EditMessageRequest  $request
     * @param  EditMessage  $editMessage
     * @param  Thread  $thread
     * @param  Message  $message
     * @return MessageResource
     *
     * @throws AuthorizationException|Throwable
     */
    public function update(EditMessageRequest $request,
                           EditMessage $editMessage,
                           Thread $thread,
                           Message $message): MessageResource
    {
        $this->authorize('update', [
            $message,
            $thread,
        ]);

        return $editMessage->execute(
            $thread,
            $message,
            $request->input('message')
        )->getJsonResource();
    }

    /**
     * Remove embeds from message.
     *
     * @param  RemoveEmbeds  $removeEmbeds
     * @param  Thread  $thread
     * @param  Message  $message
     * @return JsonResponse
     *
     * @throws AuthorizationException
     */
    public function removeEmbeds(RemoveEmbeds $removeEmbeds,
                                 Thread $thread,
                                 Message $message): JsonResponse
    {
        $this->authorize('removeEmbeds', [
            $message,
            $thread,
        ]);

        return $removeEmbeds->execute(
            $thread,
            $message
        )->getEmptyResponse();
    }

    /**
     * Remove the message.
     *
     * @param  ArchiveMessage  $archiveMessage
     * @param  Thread  $thread
     * @param  Message  $message
     * @return JsonResponse
     *
     * @throws AuthorizationException|Exception
     */
    public function destroy(ArchiveMessage $archiveMessage,
                            Thread $thread,
                            Message $message): JsonResponse
    {
        $this->authorize('delete', [
            $message,
            $thread,
        ]);

        return $archiveMessage->execute(
            $thread,
            $message
        )->getEmptyResponse();
    }
}
