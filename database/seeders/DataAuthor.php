<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class DataAuthor extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $faker = Faker\Factory::create();

        DB::table('Author')->insert([
            'id' => 5,
            'publishedBooks' => 8,
            'nameAuthor' => "Tom Robbins",
            'Description' => 'Tom Robbins , tên đầy đủ là Thomas Eugene Robbins , (sinh ngày 22 tháng 7 năm 1932, Blowing Rock, North Carolina , Hoa Kỳ), tiểu thuyết gia người Mỹ nổi tiếng với những nhân vật lập dị , lạc quan vui tươi và cách chơi chữ tự giác.
                Robbins được đào tạo tại Đại học Washington and Lee , Viện Chuyên nghiệp Richmond và Đại học Washington . Ông phục vụ trong Lực lượng Không quân Hoa Kỳ , đi nhờ xe trên khắp Hoa Kỳ, làm nhà báo và nhà phê bình nghệ thuật. Hai cuốn tiểu thuyết đầu tiên của ông chỉ trở nên nổi tiếng khi chúng được phát hành dưới dạng ấn bản bìa mềm.Another Roadside Attraction (1971), dựa trên nghiên cứu sâu rộng về Cơ đốc giáo ban đầu, kể về một người dân vùng nông thôn Washington, người đã đánh cắp xác ướp của Chúa Giê-su Christ .Even Cowgirls Get the Blues (1976; quay 1994) là câu chuyện về một phụ nữ đi nhờ xe ôm có ngón tay cái khổng lồ đến thăm spa của một phụ nữ ở Nam Dakota .
                Các tiểu thuyết sau này của Robbins bao gồm Tĩnh vật với chim gõ kiến (1980);Jitterbug Perfume (1984), xoay quanh một vị vua thời Trung cổ sống 1.000 năm trước khi trở thành người gác cổng trong phòng thí nghiệm của Albert Einstein ;Skinny Legs and All (1990), một cuốn tiểu thuyết kỳ ảo kể về năm đồ vật vô tri vô giác trong hành trình đến Jerusalem trong khi khám phá xung đột Ả Rập-Israel và chủ nghĩa chính thống tôn giáo, cùng các chủ đề chính trị khác;Half Asleep in Frog Pyjamas (1994);Ngôi nhà thương binh khốc liệt từ vùng khí hậu nóng (2000), câu chuyện về một đặc vụ CIA theo chủ nghĩa khoái lạc bị một pháp sư người Peru nguyền rủa để mãi mãi giữ chân anh ta khỏi mặt đất nếu không anh ta chết; và Villa Incognito (2003). Wild Ducks Flying Backward (2005) là một bộ sưu tập các bài viết bao gồm các bài tiểu luận, truyện du ký và thơ. các cuốn hồi ký Bánh đào Tây Tạng: Lời kể có thật về một cuộc sống giàu trí tưởng tượng được xuất bản vào năm 2014.',
            'image' => "imag-21.jpg",
            'facebook' => "https://www.facebook.com/TonyRobbins/",
            'Twitter' => "https://twitter.com/tonyrobbins",
        ]);
        DB::table('Author')->insert([
            'id' => 6,
            'publishedBooks' => 10,
            'nameAuthor' => "CamBridge",
            'Description' => "Byone sinh nam 1950 nguoi nuoc anh",
            'image' => "imag-21.jpg",
            'facebook' => "#",
            'Twitter' => "#",
        ]);
        DB::table('Author')->insert([
            'id' => 7,
            'publishedBooks' => 30,
            'nameAuthor' => "Deborah ChanceLLor",
            'Description' => "Ronaldo made his senior international debut for Portugal in 2003 at age 18, and has since earned over 170 caps, including appearing and scoring in ten major tournaments,",
            'image' => "imag-23.jpg",
            'facebook' => "#",
            'Twitter' => "#",
        ]);
        DB::table('Author')->insert([
            'id' => 8,
            'publishedBooks' => "",
            'nameAuthor' => "Red Whittaker",
            'Description' => " (born June 14, 1946) is an American media personality and businessman who served as the 45th president of the United States from 2017 to 2021.",
            'image' => "imag-26.jpg",
            'facebook' => "#",
            'Twitter' => "#",
        ]);
        DB::table('Author')->insert([
            'id' => 9,
            'publishedBooks' => "",
            'nameAuthor' => "Miguel de Cervantes",
            'Description' => "Yoon worked as a programmer for investment management firms for 20 years before the publication of her first book.[4] She was inspired to write her debut novel, Everything, Everything, after the birth of her biracial daughter. Yoon wanted to write a book that reflected her child on the pages.[3][5] Her first-time mother worries about protecting her baby from danger gave her the idea to write a story about a 17-year-old girl who needed the same level of protection.[6][7] It took Yoon three years to write the book, writing early in the mornings while working full-time and raising her infant daughter.[3][6] Her husband, Korean American graphic designer David Yoon, drew the illustrations.",
            'image' => "mi.jpg",
            'facebook' => "#",
            'Twitter' => "#",
        ]);
        //Author for 1o for 5 books
        DB::table('Author')->insert([
            'id' => 10,
            'publishedBooks' => "14",
            'nameAuthor' => " Nicola Yoon",
            'Description' => "Yoon worked as a programmer for investment management firms for 20 years before the publication of her first book.[4] She was inspired to write her debut novel, Everything, Everything, after the birth of her biracial daughter. Yoon wanted to write a book that reflected her child on the pages.[3][5] Her first-time mother worries about protecting her baby from danger gave her the idea to write a story about a 17-year-old girl who needed the same level of protection.[6][7] It took Yoon three years to write the book, writing early in the mornings while working full-time and raising her infant daughter.[3][6] Her husband, Korean American graphic designer David Yoon, drew the illustrations.",
            'image' => "ni.jpg",
            'facebook' => "#",
            'Twitter' => "#",
        ]);
        // authorJack London
        DB::table('Author')->insert([
            'id' => 11,
            'publishedBooks' => "23",
            'nameAuthor' => "Jack London",
            'Description' => "John Griffith London (born John Griffith Chaney;[1] January 12, 1876 – November 22, 1916)[2][3][4][5] was an American novelist, journalist, and social activist. A pioneer of commercial fiction and American magazines, he was one of the first American authors to become an international celebrity and earn a large fortune from writing.[citation needed] He was also an innovator in the genre that would later become known as science fiction.[6]",
            'image' => "jack.jpeg",
            'facebook' => "#",
            'Twitter' => "#",
        ]);
        // ken
        DB::table('Author')->insert([
            'id' => 12,
            'publishedBooks' => "45",
            'nameAuthor' => "Jack London",
            'Description' => "Kenneth Elton Kesey (September 17, 1935 – November 10, 2001) was an American novelist, essayist, and countercultural figure. He considered himself a link between the Beat Generation of the 1950s and the hippies of the 1960s.",
            'image' => "ken.jpg",
            'facebook' => "#",
            'Twitter' => "#",
        ]);
        // Thomas Mann
        DB::table('Author')->insert([
            'id' => 20,
            'publishedBooks' => "22",
            'nameAuthor' => "Thomas Mann",
            'Description' => "Paul Thomas Mann (German: [paʊ̯l toːmas man]; 6 June 1875 – 12 August 1955) was a German novelist, short story writer, social critic, philanthropist, essayist, and the 1929 Nobel Prize in Literature laureate. His highly symbolic and ironic epic novels and novellas are noted for their insight into the psychology of the artist and the intellectual.",
            'image' => "thomas.jpg",
            'facebook' => "#",
            'Twitter' => "#",
        ]);
        //Robe
        DB::table('Author')->insert([
            'id' => 21,
            'publishedBooks' => "22",
            'nameAuthor' => "Thomas Mann",
            'Description' => "Robert Cecil Martin, colloquially called Uncle Bob,[2] is an American software engineer, instructor, and best-selling author. He is most recognized for developing many software design principles and for being a founder of the influential Agile Manifesto.[3]",
            'image' => "robe.jpg",
            'facebook' => "#",
            'Twitter' => "#",
        ]);
        //Dusty Phillips
        DB::table('Author')->insert([
            'id' => 22,
            'publishedBooks' => "22",
            'nameAuthor' => "Dusty Phillips",
            'Description' => "Dusty Phillips is a Canadian author and programmer. He holds a master's degree in computer science emphasizing human computer interaction. He's been toying with programming ever since accidentally inserting a comma into a Q-BASIC program (NIBBLES.BAS) and eventually debugging it so he could continue playing his favourite game. Today he's got more Python interpreters on his laptop than he can count and is constantly experimenting with new technologies.",
            'image' => "dus.jpg",
            'facebook' => "#",
            'Twitter' => "#",
        ]);
        //Charles Petzold
        DB::table('Author')->insert([
            'id' => 23,
            'publishedBooks' => "32",
            'nameAuthor' => "Charles Petzold",
            'Description' => "Charles Petzold has been writing about Windows programming for 25 years. A Windows Pioneer Award winner, Petzold is author of the classic Programming Windows, the widely acclaimed Code: The Hidden Language of Computer Hardware and Software, Programming Windows Phone 7, and more than a dozen other books.",
            'image' => "cha.jpg",
            'facebook' => "#",
            'Twitter' => "#",
        ]);
        //Kevin Horsley
        DB::table('Author')->insert([
            'id' => 24,
            'publishedBooks' => "99",
            'nameAuthor' => "Kevin Horsley",
            'Description' => "For over 25 years, Kevin Horsley has been analyzing the mind and memory and its capacity for brilliance. He is one of only a few people in the world to have received the title International Grandmaster of Memory",
            'image' => "cha.jpg",
            'facebook' => "#",
            'Twitter' => "#",
        ]);
        //Sönke Ahrens
        DB::table('Author')->insert([
            'id' => 25,
            'publishedBooks' => "39",
            'nameAuthor' => "Sönke Ahrens",
            'Description' => "2/2 Maybe even in media progress is possible. Portraying more interesting role models, providing better measurements of success, focusing on problem-solving, keeping an eye on what is really important in the long run. Isn't there a real demand for a media outlet like this?",
            'image' => "so.jpg",
            'facebook' => "#",
            'Twitter' => "#",
        ]);
        //seeder authors
        $limit = 800;
        $fake  = Faker::create();
        for ($i = 0; $i < $limit; $i++) {
            DB::table('Author')->insert([    
                'publishedBooks' => $fake->numberBetween($min = 1, $max = 300),
                'nameAuthor' =>$fake->sentence(2),
                'Description' => $fake->sentence(70),
                'image' => 'a'. $fake->numberBetween($min = 1, $max = 46).'.jpg',
                'facebook' => "#",
                'Twitter' => "#",
            ]);
        }
    }
}
