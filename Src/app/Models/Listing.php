<?PHP
namespace App\Models;

class Listing{
  public static function all(){
    return [
        [
          'id' => 1,
          'title' => 'Junior Software engineer',
          'description' => "We are seeking a skilled and motivated Software Engineer 
          to join our dynamic development team. As a Software Engineer, 
          you will play a key role in designing, developing, and maintaining 
          high-quality software solutions that meet the needs of our organization 
          and customers. You will collaborate with cross-functional teams to translate 
          requirements into technical specifications, implement robust and scalable 
          softwaresolutions, and contribute to the continuous improvement 
          of our software development processes."
        ],
        [
          'id' => 2,
          'title' => 'Senior Database administrator',
          'description' => "We are looking for an experienced and highly skilled Senior 
          Database Administrator to join our team. As a Senior Database Administrator, 
          you will be responsible for managing and maintaining our organization's databases, 
          ensuring their integrity, security, and optimal performance. 
          You will work closely with development teams, system administrators, 
          and stakeholders to design and implement efficient database solutions 
          that support our business requirements. Your expertise and leadership in 
          database administration will play a crucial role in ensuring the stability, 
          scalability, and reliability of our data infrastructure.."
        ]
    ];
  }
  public static function find($id) {
    $listings = self::all();

    foreach($listings as $listing){
      if($listing['id'] == $id){
        return $listing;
      }
    }
  }
}



