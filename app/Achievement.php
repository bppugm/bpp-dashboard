<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Achievement extends Model
{
    protected $guarded = ['id'];
    protected $appends = ['formatted_updated_at'];

    public static function getData($data = [])
    {
        $achievement = new Achievement;

        $data['article_scopus'] = $achievement->where('name', 'article_scopus')->first();
        $data['article_other'] = $achievement->where('name', 'article_other')->first();
        $data['proceeding_scopus'] = $achievement->where('name', 'proceeding_scopus')->first();
        $data['proceeding_other'] = $achievement->where('name', 'proceeding_other')->first();
        $data['book'] = $achievement->where('name', 'book')->first();
        $data['citation_scopus'] = $achievement->where('name', 'citation_scopus')->first();
        $data['total_citation'] = $achievement->where('name', 'total_citation')->first();
        $data['copyright'] = $achievement->where('name', 'copyright')->first();
        $data['sinta_account'] = $achievement->where('name', 'sinta_account')->first();
        $data['total_staff'] = $achievement->where('name', 'total_staff')->first();

        return $data;
    }

    public function getFormattedUpdatedAtAttribute(){
        return $this->updated_at->format('j F Y');
    }
        
}
