<?php
/**
 * Created by PhpStorm.
 * User: goisl
 * Date: 12/05/2016
 * Time: 14:24
 */

namespace Projeto\Services;


use Illuminate\Filesystem\Filesystem;
use Illuminate\Contracts\Filesystem\Factory as Storage;
use Illuminate\Http\Response;
use Projeto\Repositories\ProjectFileRepository;

class ProjectFileService
{
    /**
     * @var ProjectFileRepository
     */
    private $repository;
    /**
     * @var Filesystem
     */
    private $filesystem;
    /**
     * @var Storage
     */
    private $storage;

    /**
     * ProjectFileService constructor.
     * @param ProjectFileRepository $repository
     * @param Filesystem $filesystem
     * @param Storage $storage
     */
    public function __construct(ProjectFileRepository $repository, Filesystem $filesystem, Storage $storage)
    {
        $this->repository = $repository;
        $this->filesystem = $filesystem;
        $this->storage = $storage;

        date_default_timezone_set('America/Sao_Paulo');
    }

    public function add($file, $extension, $projectId)
    {
        //verificar extensão do arquivo. Barrar se for diferente de zip ou pdf
        //verificar se esse usuario ja submeteu, nesse caso faz um update
        //criar um padrão de nomeação de arquivos

        $this->storage->disk('local')->put($file->getFilename().'.'.$extension,  $this->filesystem->get($file));

        $entry['mime'] = $file->getClientMimeType();
        $entry['original_filename'] = $file->getClientOriginalName();
        $entry['filename'] = $file->getFilename().'.'.$extension;
        $entry['project_id'] = $projectId;

        $file = $this->repository->create($entry);

        //NO LUGAR DE RANDOM AQUI COLOCAR O ID DO USUARIO CONECTADO
        $file->users()->attach(random_int(1, 21), ['protocol_number' => $this->getProtocolNumber()]);
    }

    public function get($filename)
    {
        $entry = $this->repository->findWhere(['filename' => $filename])->first();
        $file = $this->storage->disk('local')->get($entry->filename);

        return (new Response($file, 200))->header('Content-Type', $entry->mime);
    }

    private function getProtocolNumber()
    {
        return date('Y') . date('m') . date('d') . date('G') . date('i') . date('s');
    }

}