@if (!empty($object) && \App\Helpers\Admin\Helper::checkRights(\Request::url(), 'edit'))
    <div class="admin_show {{ ($object->hide ?? 0) == 0 ? 'admin_show_act' : '' }}" title='Показывать на сайте'
        data-id='{{ empty($id) ? $object->id : $id }}' data-class='{{ get_class($object) }}'></div>
@endif
