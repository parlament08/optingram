<?php

namespace App\Repositories;

use App\Exceptions\GeneralException;
use App\Models\Meta;
use App\Repositories\Contracts\MetaRepository;
use App\Repositories\Traits\HtmlActionsButtons;
use Exception;
use Illuminate\Support\Facades\DB;

/**
 * Class EloquentMetaRepository.
 */
class EloquentMetaRepository extends BaseRepository implements MetaRepository
{
    use HtmlActionsButtons;

    /**
     * Associated Repository Model.
     */
    const MODEL = Meta::class;

    /**
     * @return mixed
     */
    public function get()
    {
        return $this->query()->select([
            'id',
            'locale',
            'route',
            'title',
            'description',
            'created_at',
            'updated_at',
        ])->orderBy('locale')->orderBy('route');
    }

    /**
     * @param $locale
     * @param $route
     *
     * @return Meta
     */
    public function find($locale, $route)
    {
        /* @var Meta $meta */
        return $this->query()->whereLocale($locale)->whereRoute($route)->first();
    }

    /**
     * @param  $input
     *
     * @return \App\Models\Meta
     *
     * @throws \Exception|\Throwable
     */
    public function store($input)
    {
        $meta = self::MODEL;

        /** @var Meta $meta */
        $meta = new $meta($input);

        if ($this->find($meta->locale, $meta->route)) {
            throw new GeneralException(trans('exceptions.backend.metas.already_exist'));
        }

        DB::transaction(function () use ($meta) {
            if ($meta->save()) {
                return true;
            }

            throw new GeneralException(trans('exceptions.backend.metas.create'));
        });

        return $meta;
    }

    /**
     * @param Meta $meta
     * @param      $input
     *
     * @return \App\Models\Meta
     *
     * @throws Exception
     * @throws \Exception|\Throwable
     */
    public function update(Meta $meta, $input)
    {
        if (($existingMeta = $this->find($meta->locale, $meta->route)) && $existingMeta->id !== $meta->id) {
            throw new GeneralException(trans('exceptions.backend.metas.already_exist'));
        }

        DB::transaction(function () use ($meta, $input) {
            if ($meta->update($input)) {
                $meta->save();

                return true;
            }

            throw new GeneralException(trans('exceptions.backend.metas.update'));
        });

        return $meta;
    }

    /**
     * @param Meta $meta
     *
     * @return bool|null
     *
     * @throws \Exception|\Throwable
     */
    public function destroy(Meta $meta)
    {
        DB::transaction(function () use ($meta) {
            if ($meta->delete()) {
                return true;
            }

            throw new GeneralException(trans('exceptions.backend.metas.delete'));
        });

        return true;
    }

    /**
     * @param \App\Models\Meta $meta
     *
     * @return mixed
     */
    public function getActionButtons(Meta $meta)
    {
        $buttons = $this->getEditButtonHtml('admin.meta.edit', $meta)
            .$this->getDeleteButtonHtml('admin.meta.destroy', $meta);

        return $buttons;
    }
}
