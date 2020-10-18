<?php

class DataStorage
{
    private $resource;
    private array $links;

    public function __construct()
    {
        $this->resource = fopen('links.csv', 'r+');
        $this->loadLinks();
    }

    private function loadLinks(): void
    {
        while (!feof($this->resource)) {
            $data = (array)fgetcsv($this->resource);
            if ($data) {
                $this->links[] = $data;
            }
        }
    }

    public function getLinks(): ?array
    {
        return $this->links;
    }

    public function changeLike(int $id, int $like): void
    {
        $this->links[$id][0] += $like;
        $resource = fopen("links.csv", "w+");
        foreach ($this->links as $link) {
            if (count($link) > 1) {
                fputcsv($resource, $link);
            }
        }
        fclose($resource);
    }
}
